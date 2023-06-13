@extends('layouts.admin')
@section('content')


<h1>Projects</h1>
    <div class="text-end">
        <a class="btn btn-success" href="{{ route('admin.projects.create') }}">Create a new project</a>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        {{-- <th scope="col">Image</th> --}}
        <th scope="col">Created</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
        <tr>
            <th scope="row">{{ $project->id }}</th>
            <td>{{ $project->title }}</td>
            {{-- <td><img class="img-thumbnail" style="width:100px" src="{{ $post->image }}" alt="{{ $post->title }}"></td> --}}
            <td>{{ $project->created_at }}</td>
            <td>{{ $project->category ? $project->category->name : 'Senza categoria' }}</td>
            <td>
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-primary text-white"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-warning text-white mx-5"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="delete-button btn btn-danger text-white" data-item-title="{{ $project->title }}"> <i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
  </table>

  @endsection
