@extends('layouts.app')

@section('title', 'Welcome - Laravel App')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body text-center">
                <h1 class="card-title text-primary">
                    <i class="fas fa-rocket"></i> Welcome to Laravel!
                </h1>
                <p class="card-text">
                    Your Laravel application is now running with Bootstrap and Vanilla JavaScript.
                </p>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary me-2">
                        <i class="fas fa-book"></i> Documentation
                    </a>
                    <a href="#" class="btn btn-success me-2">
                        <i class="fas fa-github"></i> GitHub
                    </a>
                    <a href="#" class="btn btn-info">
                        <i class="fas fa-users"></i> Community
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-code text-primary"></i> Laravel
                </h5>
                <p class="card-text">
                    The PHP framework for web artisans. Build robust, scalable applications.
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fab fa-bootstrap text-primary"></i> Bootstrap
                </h5>
                <p class="card-text">
                    Build responsive, mobile-first projects with the world's most popular CSS framework.
                </p>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fab fa-js text-warning"></i> Vanilla JS
                </h5>
                <p class="card-text">
                    Pure JavaScript without any frameworks. Fast, lightweight, and powerful.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-tools"></i> Quick Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="App.showAlert('Hello from Vanilla JS!')">
                        <i class="fas fa-bell"></i> Show Alert
                    </button>
                    <button class="btn btn-outline-success" onclick="App.confirm('Are you sure?', () => App.showAlert('Confirmed!'))">
                        <i class="fas fa-check"></i> Confirm Dialog
                    </button>
                    <button class="btn btn-outline-info" onclick="App.copyToClipboard('Hello World!')">
                        <i class="fas fa-copy"></i> Copy to Clipboard
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle"></i> System Info
                </h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Laravel Version:</span>
                        <span class="badge bg-primary">{{ app()->version() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>PHP Version:</span>
                        <span class="badge bg-success">{{ phpversion() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Environment:</span>
                        <span class="badge bg-info">{{ app()->environment() }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Debug Mode:</span>
                        <span class="badge bg-{{ config('app.debug') ? 'warning' : 'secondary' }}">
                            {{ config('app.debug') ? 'ON' : 'OFF' }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-search"></i> Search Demo
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search in table..." onkeyup="App.search('searchInput', 'demoTable')">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="demoTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>Admin</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                            <tr>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>User</td>
                                <td><span class="badge bg-warning">Pending</span></td>
                            </tr>
                            <tr>
                                <td>Bob Johnson</td>
                                <td>bob@example.com</td>
                                <td>Editor</td>
                                <td><span class="badge bg-success">Active</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
