<!DOCTYPE HTML>
<html lang="ja">


@extends('layouts.app')

@section('title', '選手情報編集')

@section('content')
    <h1>選手情報編集</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('player.update', ['id' => $player->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="uniform_num">背番号</label>
            <input type="number" name="uniform_num" class="form-control" value="{{ old('uniform_num', $player->uniform_num) }}" required>
            @error('uniform_num')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="position">ポジション</label>
            <select name="position" class="form-control" required>
                @foreach($positions as $position)
                    <option value="{{ $position }}" {{ $player->position == $position ? 'selected' : '' }}>{{ $position }}</option>
                @endforeach
            </select>
            @error('position')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $player->name) }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="country_id">国</label>
            <select name="country_id" class="form-control" required>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ $player->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                @endforeach
            </select>
            @error('country_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="club">所属</label>
            <input type="text" name="club" class="form-control" value="{{ old('club', $player->club) }}" required>
            @error('club')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="birth">誕生日</label>
            <input type="date" name="birth" class="form-control" value="{{ old('birth', $player->birth) }}" required>
            @error('birth')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="height">身長</label>
            <input type="number" name="height" class="form-control" value="{{ old('height', $player->height) }}" required>
            @error('height')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="weight">体重</label>
            <input type="number" name="weight" class="form-control" value="{{ old('weight', $player->weight) }}" required>
            @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">編集</button>
    </form>
@endsection