<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import { Search, Filter, FileText, Clock, CheckCircle, XCircle, User, Settings, Eye, EyeOff } from 'lucide-vue-next';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Badge } from '@/components/ui/badge';
import { Checkbox } from '@/components/ui/checkbox';
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogTrigger } from '@/components/ui/dialog';

interface WorkflowCategory {
    id: number;
    name: string;
    slug: string;
    description?: string;
}

interface WorkflowTemplate {
    id: number;
    name: string;
}

interface User {
    id: number;
    name: string;
}

interface WorkflowStatus {
    id: number;
    name: string;
    slug: string;
    description?: string;
    color?: string;
    order: number;
}

interface Customer {
    id: number;
    name: string;
    code?: string;
}

interface Branch {
    name: string;
    code?: string;
}

interface ParsedFormData {
    customer?: Customer;
    optimus_account_no?: string;
    customer_branch?: Branch;
    initiator_branch?: Branch;
    total_amount?: number;
    custom_fields?: Record<string, any>;
    field_labels?: Record<string, string>;
}

interface Workflow {
    id: number;
    title: string;
    status: 'InProgress' | 'Completed' | 'Rejected' | 'Draft';
    created_at: string;
    template?: WorkflowTemplate;
    initiator?: User;
    current_approver?: User;
    current_status?: WorkflowStatus;
    last_action_by?: User;
    last_action_at?: string;
    can_change_status?: boolean;
    customer?: Customer;
    optimus_account_no?: string;
    parsed_form_data?: ParsedFormData;
}

interface Props {
    category: WorkflowCategory;
    workflows: {
        data: Workflow[];
        links: any[];
        meta: any;
    };
    stats: {
        total: number;
        completed: number;
        in_progress: number;
        rejected: number;
    };
    filters: {
        status?: string;
        search?: string;
        date_from?: string;
        date_to?: string;
    };
    availableStatuses: WorkflowStatus[];
}

const props = defineProps<Props>();

// Form verilerini ref olarak tanımla
const searchForm = ref({
    status: props.filters.status || 'Completed',
    search: props.filters.search || '',
    date_from: props.filters.date_from || '',
    date_to: props.filters.date_to || ''
});

// Kolon seçimi için state
const columnSettings = ref({
    isOpen: false,
    selectedColumns: {
        workflow: true,
        customer: true,
        previousAgent: true,
        currentAgent: true,
        previousAcquisition: true,
        currentAcquisition: true,
        previousNLevel: true,
        currentNLevel: true,
        approver1: true,
        approver2: true,
        approver3: true,
        customerBranch: true,
        initiatorBranch: true,
        status: true,
        lastActionBy: true,
        initiator: true,
        date: true,
        actions: true
    }
});

// Kolon tanımları
const columnDefinitions = [
    { key: 'workflow', label: 'İş Akışı', required: true },
    { key: 'customer', label: 'Müşteri', required: false },
    { key: 'previousAgent', label: 'Önceki Temsilci', required: false },
    { key: 'currentAgent', label: 'Güncel Temsilci', required: false },
    { key: 'previousAcquisition', label: 'Önceki Kazandıran', required: false },
    { key: 'currentAcquisition', label: 'Güncel Kazandıran', required: false },
    { key: 'previousNLevel', label: 'Önceki N Katı', required: false },
    { key: 'currentNLevel', label: 'Mevcut N Katı', required: false },
    { key: 'approver1', label: 'Onaycı', required: false },
    { key: 'approver2', label: '2. Onaycı', required: false },
    { key: 'approver3', label: '3. Onaycı', required: false },
    { key: 'customerBranch', label: 'Müşteri Şubesi', required: false },
    { key: 'initiatorBranch', label: 'İşlem Yapan Şube', required: false },
    { key: 'status', label: `${props.category.name} Durumu`, required: true },
    { key: 'lastActionBy', label: 'Durumu Değiştiren', required: false },
    { key: 'initiator', label: 'Talep Sahibi', required: false },
    { key: 'date', label: 'Tarih', required: true },
    { key: 'actions', label: 'İşlemler', required: true }
];

// Görünür kolonları hesapla
const visibleColumns = computed(() => {
    return columnDefinitions.filter(col => columnSettings.value.selectedColumns[col.key]);
});

const statusOptions = [
    { value: 'Completed', label: 'Tamamlandı' },
    { value: 'all', label: 'Tüm Durumlar' },
    { value: 'InProgress', label: 'Devam Ediyor' },
    { value: 'Rejected', label: 'Reddedildi' },
    { value: 'Draft', label: 'Taslak' }
];

const getStatusBadge = (status: string) => {
    const statusMap = {
        'InProgress': { class: 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300', icon: Clock, text: 'Devam Ediyor' },
        'Completed': { class: 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300', icon: CheckCircle, text: 'Tamamlandı' },
        'Rejected': { class: 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300', icon: XCircle, text: 'Reddedildi' },
        'Draft': { class: 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300', icon: FileText, text: 'Taslak' }
    };

    return statusMap[status as keyof typeof statusMap] || statusMap.Draft;
};

const formatDate = (dateString: string) => {
    return new Date(dateString).toLocaleDateString('tr-TR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
};

const applyFilters = () => {
    const filters: any = {};

    if (searchForm.value.status && searchForm.value.status !== 'all') {
        filters.status = searchForm.value.status;
    }
    if (searchForm.value.search) {
        filters.search = searchForm.value.search;
    }
    if (searchForm.value.date_from) {
        filters.date_from = searchForm.value.date_from;
    }
    if (searchForm.value.date_to) {
        filters.date_to = searchForm.value.date_to;
    }

    router.get(route('workflows.category', props.category.slug), filters, {
        preserveState: true,
        preserveScroll: true
    });
};

const resetFilters = () => {
    searchForm.value = {
        status: 'Completed',
        search: '',
        date_from: '',
        date_to: ''
    };
    applyFilters();
};

// Durum değiştirme - Her workflow için seçili status ID'yi tutmak
const pendingStatusChanges = ref<Record<number, number>>({});
const savingStatus = ref<Record<number, boolean>>({});

// Status seçimi değiştiğinde
const onStatusChange = (workflowId: number, newStatusId: number) => {
    pendingStatusChanges.value[workflowId] = newStatusId;
};

// Save butonuna tıklandığında
const saveStatusChange = async (workflow: Workflow) => {
    const newStatusId = pendingStatusChanges.value[workflow.id];

    if (!newStatusId || workflow.current_status?.id === newStatusId) {
        // Değişiklik yoksa ya da aynı durum seçildiyse kaydetme
        delete pendingStatusChanges.value[workflow.id];
        return;
    }

    savingStatus.value[workflow.id] = true;

    try {
        await router.post(
            route('workflows.changeStatus', workflow.id),
            {
                status_id: newStatusId,
                comment: null
            },
            {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    delete pendingStatusChanges.value[workflow.id];
                }
            }
        );
    } catch (error) {
        console.error('Durum değiştirme hatası:', error);
    } finally {
        savingStatus.value[workflow.id] = false;
    }
};

// Seçili status ID'yi al (pending varsa onu, yoksa current'i)
const getSelectedStatusId = (workflow: Workflow): string => {
    const pendingId = pendingStatusChanges.value[workflow.id];
    return pendingId ? pendingId.toString() : (workflow.current_status?.id.toString() || '');
};

// Değişiklik var mı kontrol et
const hasStatusChange = (workflow: Workflow): boolean => {
    const pendingId = pendingStatusChanges.value[workflow.id];
    return pendingId !== undefined && pendingId !== workflow.current_status?.id;
};

const getStatusColor = (color?: string) => {
    if (!color) return 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300';

    // Hex to Tailwind class approximation
    const colorMap: Record<string, string> = {
        '#3B82F6': 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-300',
        '#F59E0B': 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-300',
        '#10B981': 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-300',
        '#6366F1': 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/20 dark:text-indigo-300',
        '#EF4444': 'bg-red-100 text-red-800 dark:bg-red-900/20 dark:text-red-300',
        '#6B7280': 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300',
    };

    return colorMap[color.toUpperCase()] || 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-300';
};

// Form data helper functions
const getFieldLabel = (fieldName: string, workflow: Workflow): string => {
    if (!workflow || !workflow.parsed_form_data || !workflow.parsed_form_data.field_labels) {
        return fieldName;
    }
    return workflow.parsed_form_data.field_labels[fieldName] || fieldName;
};

const formatFieldValue = (value: any): string => {
    if (value === null || value === undefined || value === '') {
        return '-';
    }

    if (Array.isArray(value)) {
        return value.join(', ');
    }

    if (typeof value === 'object') {
        // Object'i düzgün formatta göster
        return JSON.stringify(value);
    }

    if (typeof value === 'boolean') {
        return value ? 'Evet' : 'Hayır';
    }

    return String(value);
};

const hasCustomFields = (workflow: Workflow): boolean => {
    if (!workflow || !workflow.parsed_form_data || !workflow.parsed_form_data.custom_fields) {
        return false;
    }
    return Object.keys(workflow.parsed_form_data.custom_fields).length > 0;
};

// Kolon seçim fonksiyonları
const toggleColumn = (columnKey: string) => {
    const column = columnDefinitions.find(col => col.key === columnKey);
    if (column && !column.required) {
        columnSettings.value.selectedColumns[columnKey] = !columnSettings.value.selectedColumns[columnKey];
    }
};

const selectAllColumns = () => {
    columnDefinitions.forEach(col => {
        columnSettings.value.selectedColumns[col.key] = true;
    });
};

const deselectAllColumns = () => {
    columnDefinitions.forEach(col => {
        if (!col.required) {
            columnSettings.value.selectedColumns[col.key] = false;
        }
    });
};

// Kolon içeriğini render et
const renderColumnContent = (workflow: Workflow, columnKey: string) => {
    switch (columnKey) {
        case 'workflow':
            return {
                content: `
                    <div>
                        <div class="text-xs font-medium text-gray-900 dark:text-white">
                            ${workflow.title}
                        </div>
                        ${workflow.parsed_form_data?.optimus_account_no ? `
                            <div class="text-[10px] text-gray-500 dark:text-gray-400 mt-0.5">
                                Hesap: ${workflow.parsed_form_data.optimus_account_no}
                            </div>
                        ` : ''}
                    </div>
                `
            };
        case 'customer':
            return {
                content: workflow.parsed_form_data?.customer ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.parsed_form_data.customer.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'previousAgent':
            return {
                content: workflow.form_data?._workflow_agent_info?.customer_agent?.name ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.form_data._workflow_agent_info.customer_agent.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'currentAgent':
            return {
                content: workflow.form_data?._workflow_agent_info?.requested_agent?.name ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.form_data._workflow_agent_info.requested_agent.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'previousAcquisition':
            return {
                content: workflow.form_data?._workflow_acquisition_info?.customer_acquisition_user?.name ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.form_data._workflow_acquisition_info.customer_acquisition_user.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'currentAcquisition':
            return {
                content: workflow.form_data?._workflow_acquisition_info?.requested_acquisition_user?.name ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.form_data._workflow_acquisition_info.requested_acquisition_user.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'previousNLevel':
            return {
                content: workflow.current_approver?.name ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.current_approver.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'currentNLevel':
            return {
                content: '<span class="text-xs text-gray-400 dark:text-gray-500">2. Onaycı</span>'
            };
        case 'approver1':
            return {
                content: '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'approver2':
            return {
                content: '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'approver3':
            return {
                content: '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'customerBranch':
            return {
                content: workflow.parsed_form_data?.customer_branch ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.parsed_form_data.customer_branch.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'initiatorBranch':
            return {
                content: workflow.parsed_form_data?.initiator_branch ? `
                    <div class="text-xs">
                        <div class="font-medium text-gray-900 dark:text-white">
                            ${workflow.parsed_form_data.initiator_branch.name}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'status':
            return {
                isSpecial: true,
                content: workflow
            };
        case 'lastActionBy':
            return {
                content: workflow.last_action_by ? `
                    <div class="flex items-center gap-1.5">
                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <div>
                            <div class="text-xs font-medium text-gray-900 dark:text-white">
                                ${workflow.last_action_by.name}
                            </div>
                            ${workflow.last_action_at ? `
                                <div class="text-[10px] text-gray-500 dark:text-gray-400">
                                    ${formatDate(workflow.last_action_at)}
                                </div>
                            ` : ''}
                        </div>
                    </div>
                ` : '<span class="text-xs text-gray-400 dark:text-gray-500">-</span>'
            };
        case 'initiator':
            return {
                content: `
                    <div class="text-xs text-gray-900 dark:text-gray-300">
                        ${workflow.initiator?.name || 'Belirtilmemiş'}
                    </div>
                `
            };
        case 'date':
            return {
                content: `
                    <div class="text-xs text-gray-500 dark:text-gray-400">
                        ${formatDate(workflow.created_at)}
                    </div>
                `
            };
        case 'actions':
            return {
                content: `
                    <a href="${route('workflows.show', workflow.id)}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 text-xs">
                        Görüntüle
                    </a>
                `
            };
        default:
            return { content: '-' };
    }
};
</script>

<template>
    <AppLayout :title="`${category.name} - İş Akışları`">
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Başlık ve İstatistikler -->
                <div class="mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                {{ category.name }} İş Akışları
                            </h1>
                            <p v-if="category.description" class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ category.description }}
                            </p>
                        </div>
                    </div>

                    <!-- İstatistik Kartları -->
                    <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <FileText class="h-6 w-6 text-gray-400" />
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                                Toplam
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                                {{ stats.total }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <Clock class="h-6 w-6 text-blue-400" />
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                                Devam Ediyor
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                                {{ stats.in_progress }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <CheckCircle class="h-6 w-6 text-green-400" />
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                                Tamamlandı
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                                {{ stats.completed }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <XCircle class="h-6 w-6 text-red-400" />
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                                Reddedildi
                                            </dt>
                                            <dd class="text-lg font-medium text-gray-900 dark:text-white">
                                                {{ stats.rejected }}
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtreler -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
                    <div class="p-6">
                        <div class="flex flex-wrap gap-4 items-end">
                            <div class="flex-1 min-w-64">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Arama
                                </label>
                                <div class="relative">
                                    <Input
                                        v-model="searchForm.search"
                                        placeholder="İş akışı başlığı, şablon veya başlatan kişi..."
                                        class="pl-10"
                                        @keyup.enter="applyFilters"
                                    />
                                    <Search class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" />
                                </div>
                            </div>

                            <div class="min-w-48">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Durum
                                </label>
                                <Select v-model="searchForm.status">
                                    <SelectTrigger>
                                        <SelectValue placeholder="Durum seçin" />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem v-for="option in statusOptions" :key="option.value" :value="option.value">
                                            {{ option.label }}
                                        </SelectItem>
                                    </SelectContent>
                                </Select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Başlangıç Tarihi  
                                </label>
                                <Input
                                    v-model="searchForm.date_from"
                                    type="date"
                                />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                                    Bitiş Tarihi  
                                </label>
                                <Input
                                    v-model="searchForm.date_to"
                                    type="date"
                                />
                            </div>

                            <div class="flex gap-2">
                                <Button @click="applyFilters" class="flex items-center gap-2">
                                    <Filter class="w-4 h-4" />
                                    Filtrele
                                </Button>
                                <Button variant="outline" @click="resetFilters">
                                    Temizle
                                </Button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- İş Akışları Tablosu -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg">
                    <!-- Tablo Başlığı ve Kolon Ayarları -->
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex items-center justify-between">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">İş Akışları</h3>
                        <Dialog v-model:open="columnSettings.isOpen">
                            <DialogTrigger as-child>
                                <Button variant="outline" size="sm" class="flex items-center gap-2">
                                    <Settings class="w-4 h-4" />
                                    Kolonları Düzenle
                                </Button>
                            </DialogTrigger>
                            <DialogContent class="max-w-2xl">
                                <DialogHeader>
                                    <DialogTitle>Görünür Kolonları Seçin</DialogTitle>
                                </DialogHeader>
                                <div class="space-y-4">
                                    <div class="flex gap-2 mb-4">
                                        <Button @click="selectAllColumns" variant="outline" size="sm">
                                            Tümünü Seç
                                        </Button>
                                        <Button @click="deselectAllColumns" variant="outline" size="sm">
                                            Tümünü Kaldır
                                        </Button>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div
                                            v-for="column in columnDefinitions"
                                            :key="column.key"
                                            class="flex items-center space-x-2"
                                        >
                                            <Checkbox
                                                :id="column.key"
                                                :checked="columnSettings.selectedColumns[column.key]"
                                                :disabled="column.required"
                                                @update:checked="() => toggleColumn(column.key)"
                                            />
                                            <label
                                                :for="column.key"
                                                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                                                :class="{ 'text-gray-400': column.required }"
                                            >
                                                {{ column.label }}
                                                <span v-if="column.required" class="text-red-500 ml-1">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </DialogContent>
                        </Dialog>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th
                                        v-for="column in visibleColumns"
                                        :key="column.key"
                                        class="px-3 py-2 text-left text-[10px] font-medium text-gray-500 dark:text-gray-300 uppercase tracking-tight"
                                    >
                                        {{ column.label }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody v-if="workflows?.data?.length" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                <tr v-for="workflow in workflows.data" :key="workflow.id" class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td
                                        v-for="column in visibleColumns"
                                        :key="`${workflow.id}-${column.key}`"
                                        class="px-3 py-2"
                                        :class="{
                                            'min-w-[180px]': column.key === 'workflow',
                                            'whitespace-nowrap': ['date', 'initiator', 'actions'].includes(column.key)
                                        }"
                                    >
                                        <!-- Özel durum kolonu (status) -->
                                        <div v-if="column.key === 'status'">
                                            <div v-if="workflow.can_change_status" class="flex items-center gap-1.5">
                                                <div class="min-w-[160px]">
                                                    <Select
                                                        :model-value="getSelectedStatusId(workflow)"
                                                        @update:model-value="(value) => onStatusChange(workflow.id, parseInt(value))"
                                                    >
                                                        <SelectTrigger class="h-7 text-[11px] py-0">
                                                            <SelectValue>
                                                                <div class="flex items-center gap-1">
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full flex-shrink-0"
                                                                        :style="{ backgroundColor: availableStatuses.find(s => s.id.toString() === getSelectedStatusId(workflow))?.color || '#6B7280' }"
                                                                    ></span>
                                                                    <span class="truncate text-[11px]">
                                                                        {{ availableStatuses.find(s => s.id.toString() === getSelectedStatusId(workflow))?.name || 'Durum Seçin' }}
                                                                    </span>
                                                                </div>
                                                            </SelectValue>
                                                        </SelectTrigger>
                                                        <SelectContent>
                                                            <SelectItem
                                                                v-for="status in availableStatuses"
                                                                :key="status.id"
                                                                :value="status.id.toString()"
                                                            >
                                                                <div class="flex items-center gap-1.5 text-xs">
                                                                    <span
                                                                        class="w-1.5 h-1.5 rounded-full"
                                                                        :style="{ backgroundColor: status.color || '#6B7280' }"
                                                                    ></span>
                                                                    {{ status.name }}
                                                                </div>
                                                            </SelectItem>
                                                        </SelectContent>
                                                    </Select>
                                                </div>
                                                <Button
                                                    v-if="hasStatusChange(workflow)"
                                                    @click="saveStatusChange(workflow)"
                                                    size="sm"
                                                    class="h-7 px-2 text-[10px]"
                                                    :disabled="savingStatus[workflow.id]"
                                                >
                                                    {{ savingStatus[workflow.id] ? 'Kaydediliyor...' : 'Kaydet' }}
                                                </Button>
                                            </div>
                                            <div v-else-if="workflow.current_status" class="flex items-center gap-1.5">
                                                <Badge :class="getStatusColor(workflow.current_status.color)" class="inline-flex items-center gap-1 text-[10px] px-1.5 py-0.5">
                                                    <span
                                                        class="w-1.5 h-1.5 rounded-full"
                                                        :style="{ backgroundColor: workflow.current_status.color || '#6B7280' }"
                                                    ></span>
                                                    {{ workflow.current_status.name }}
                                                </Badge>
                                            </div>
                                            <span v-else class="text-xs text-gray-400 dark:text-gray-500">-</span>
                                        </div>

                                        <!-- Diğer kolonlar -->
                                        <div v-else v-html="renderColumnContent(workflow, column.key).content"></div>
                                    </td>
                                </tr>

                                <!-- Ek Form Verileri Satırı (Varsa) -->
                                <tr v-if="workflow && hasCustomFields(workflow)" :key="`${workflow.id}-extra`" class="bg-gray-50 dark:bg-gray-700/50">
                                    <td :colspan="visibleColumns.length" class="px-3 py-2">
                                        <div v-if="workflow.parsed_form_data && workflow.parsed_form_data.custom_fields" class="text-[10px]">
                                            <div class="font-medium text-gray-700 dark:text-gray-300 mb-1.5">Ek Bilgiler:</div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
                                                <div
                                                    v-for="(value, key) in workflow.parsed_form_data.custom_fields"
                                                    :key="key"
                                                    class="flex flex-col"
                                                >
                                                    <span class="text-gray-600 dark:text-gray-400 font-medium text-[10px]">
                                                        {{ getFieldLabel(String(key), workflow) }}:
                                                    </span>
                                                    <span class="text-gray-900 dark:text-white mt-0.5 text-[10px]">
                                                        {{ formatFieldValue(value) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Sayfalama -->
                    <div v-if="workflows.meta && workflows.meta.total > workflows.meta.per_page" class="px-6 py-3 border-t border-gray-200 dark:border-gray-700">
                        <nav class="flex items-center justify-between">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <Link
                                    v-if="workflows.links && workflows.links[0] && workflows.links[0].url"
                                    :href="workflows.links[0].url"
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                                >
                                    Önceki
                                </Link>
                                <Link
                                    v-if="workflows.links && workflows.links[workflows.links.length - 1] && workflows.links[workflows.links.length - 1].url"
                                    :href="workflows.links[workflows.links.length - 1].url"
                                    class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
                                >
                                    Sonraki
                                </Link>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        <span class="font-medium">{{ workflows.meta?.from || 0 }}</span>
                                        -
                                        <span class="font-medium">{{ workflows.meta?.to || 0 }}</span>
                                        arası,
                                        <span class="font-medium">{{ workflows.meta?.total || 0 }}</span>
                                        toplam sonuç
                                    </p>
                                </div>
                                <div v-if="workflows.links && workflows.links.length > 0">
                                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                        <Link
                                            v-for="link in workflows.links"
                                            :key="link.label"
                                            :href="link.url || '#'"
                                            :class="[
                                                link.active
                                                    ? 'z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium'
                                                    : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium',
                                                !link.url && 'cursor-not-allowed opacity-50'
                                            ]"
                                            v-html="link.label"
                                        />
                                    </nav>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <!-- Veri Yok Mesajı -->
                    <div v-if="!workflows?.data?.length" class="text-center py-12">
                        <FileText class="mx-auto h-12 w-12 text-gray-400" />
                        <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">İş akışı bulunamadı</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Bu kategoride henüz iş akışı bulunmamaktadır veya filtrelere uygun sonuç yoktur.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>