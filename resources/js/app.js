// Laravel App - Vanilla JavaScript

// CSRF Token setup untuk Axios
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

// Utility Functions
const App = {
    // Show alert message
    showAlert: function(message, type = 'success') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        const container = document.querySelector('.container');
        container.insertBefore(alertDiv, container.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    },

    // Confirm dialog
    confirm: function(message, callback) {
        if (confirm(message)) {
            callback();
        }
    },

    // Format currency
    formatCurrency: function(amount) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(amount);
    },

    // Format date
    formatDate: function(date) {
        return new Date(date).toLocaleDateString('id-ID', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    },

    // Load data with loading state
    loadData: async function(url, options = {}) {
        try {
            const response = await axios.get(url, options);
            return response.data;
        } catch (error) {
            console.error('Error loading data:', error);
            this.showAlert('Error loading data', 'danger');
            throw error;
        }
    },

    // Submit form via AJAX
    submitForm: async function(formElement, successCallback = null) {
        try {
            const formData = new FormData(formElement);
            const response = await axios.post(formElement.action, formData);
            
            if (response.data.success) {
                this.showAlert(response.data.message || 'Success!');
                if (successCallback) successCallback(response.data);
            } else {
                this.showAlert(response.data.message || 'Error occurred', 'danger');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            this.showAlert('Error submitting form', 'danger');
        }
    },

    // Delete item with confirmation
    deleteItem: function(url, itemName = 'item') {
        this.confirm(`Are you sure you want to delete this ${itemName}?`, async () => {
            try {
                const response = await axios.delete(url);
                if (response.data.success) {
                    this.showAlert(response.data.message || 'Item deleted successfully');
                    // Reload page or update UI
                    location.reload();
                }
            } catch (error) {
                console.error('Delete error:', error);
                this.showAlert('Error deleting item', 'danger');
            }
        });
    },

    // Toggle password visibility
    togglePassword: function(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.querySelector(`[onclick="App.togglePassword('${inputId}')"] i`);
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'fas fa-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'fas fa-eye';
        }
    },

    // Copy to clipboard
    copyToClipboard: function(text) {
        navigator.clipboard.writeText(text).then(() => {
            this.showAlert('Copied to clipboard!');
        }).catch(() => {
            this.showAlert('Failed to copy to clipboard', 'danger');
        });
    },

    // Search functionality
    search: function(inputId, tableId) {
        const input = document.getElementById(inputId);
        const table = document.getElementById(tableId);
        const filter = input.value.toLowerCase();
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const row = rows[i];
            const cells = row.getElementsByTagName('td');
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                const cell = cells[j];
                if (cell.textContent.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? '' : 'none';
        }
    },

    // Initialize tooltips
    initTooltips: function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    },

    // Initialize popovers
    initPopovers: function() {
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
};

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap components
    App.initTooltips();
    App.initPopovers();

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                alert.remove();
            }
        }, 5000);
    });

    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Auto-submit forms with data-ajax="true"
    const ajaxForms = document.querySelectorAll('form[data-ajax="true"]');
    ajaxForms.forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            App.submitForm(form);
        });
    });
});

// Export for use in other scripts
window.App = App;
