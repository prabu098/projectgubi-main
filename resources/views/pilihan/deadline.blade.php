@extends('layouts.app')
@section('content')
    <style>
        .main-area {
            position: relative;
            height: 100vh;
            z-index: 1;
            padding: 0 20px;
            background-size: cover;
        }
        .main-area:after {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: -1;
            opacity: .4;
        }
        .center-text {
            text-align: center;
        }
        .display-table {
            display: table;
            height: 50%;
            width: 100%;
        }
        .display-table-cell {
            display: table-cell;
            vertical-align: middle;
        }
    </style>
    <div class="main-area center-text">
        <div class="display-table">
            <div class="display-table-cell">
                <h1>Pemilihan telah berakhir</h1>
            </div>
        </div>
    </div>
@endsection
