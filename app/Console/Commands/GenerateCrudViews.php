<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateCrudViews extends Command
{
    protected $signature = 'generate:crud-views {model}';
    protected $description = 'Generates CRUD views for a given model';

    public function handle()
    {
        $modelName = $this->argument('model');
        $viewPath = resource_path("views/{$modelName}");

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        $files = [
            'index.blade.php' => $this->generateIndex($modelName),
            'create.blade.php' => $this->generateCreate($modelName),
            'edit.blade.php' => $this->generateEdit($modelName),
            'show.blade.php' => $this->generateShow($modelName),
        ];

        foreach ($files as $fileName => $content) {
            File::put("{$viewPath}/{$fileName}", $content);
        }

        $this->info("CRUD views for {$modelName} generated successfully!");
    }

    protected function generateIndex($modelName)
    {
        return <<<HTML
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista {$modelName}</h1>
    <a href="{{ route('{$modelName}.create') }}" class="btn btn-primary mb-3">Adaugă {$modelName}</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nume</th>
                <th>Acțiuni</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\${$modelName}s as \${$modelName})
                <tr>
                    <td>{{ \${$modelName}->id }}</td>
                    <td>{{ \${$modelName}->name }}</td>
                    <td>
                        <a href="{{ route('{$modelName}.show', \${$modelName}->id) }}" class="btn btn-info btn-sm">Vezi</a>
                        <a href="{{ route('{$modelName}.edit', \${$modelName}->id) }}" class="btn btn-warning btn-sm">Editează</a>
                        <form action="{{ route('{$modelName}.destroy', \${$modelName}->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
HTML;
    }

    protected function generateCreate($modelName)
    {
        return <<<HTML
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adaugă {$modelName}</h1>
    <form action="{{ route('{$modelName}.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nume</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvează</button>
    </form>
</div>
@endsection
HTML;
    }

    protected function generateEdit($modelName)
    {
        return <<<HTML
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editează {$modelName}</h1>
    <form action="{{ route('{$modelName}.update', \$id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nume</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ \$name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvează</button>
    </form>
</div>
@endsection
HTML;
    }

    protected function generateShow($modelName)
    {
        return <<<HTML
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalii {$modelName}</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nume:</strong> {{ \$name }}</li>
    </ul>
    <a href="{{ route('{$modelName}.index') }}" class="btn btn-secondary mt-3">Înapoi</a>
</div>
@endsection
HTML;
    }
}
