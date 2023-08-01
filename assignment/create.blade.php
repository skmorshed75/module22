<?php

<!-- customers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Add Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>

    <h1>Create New Email Campaign</h1>
    <form action="{{ route('email_campaigns.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="6" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create Campaign</button>
    </form>    
@endsection
