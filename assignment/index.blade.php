<?php

<!-- customers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->contact_number }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Email Campaigns List</h1>
    <a href="{{ route('email_campaigns.create') }}" class="btn btn-primary">Create New Campaign</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emailCampaigns as $campaign)
                <tr>
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->subject }}</td>
                    <td>
                        <form action="{{ route('email_campaigns.destroy', $campaign->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    

    <h1>Customer List</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary">Add Customer</a>

    <form action="{{ route('customers.index') }}" method="GET" class="mt-3">
        <div class="input-group mb-3">
            <input type="text" name="q" class="form-control" placeholder="Search customers" value="{{ $searchQuery }}">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>

    <table class="table mt-3">
        <!-- Table headers and loop for customers as before -->
    </table>    
@endsection
