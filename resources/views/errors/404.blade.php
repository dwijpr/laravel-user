@extends ('layouts.app')

@section ('styles')

    @parent

    <style>
        .container {
            text-align: center;
        }

        .content {
            padding-top: 64px;
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>

@endsection

@section ('content')

    <div class="container">
        <div class="content">
            <h2>
                <code>404</code>
            </h2>
            <div class="title">Not Found.</div>
        </div>
    </div>

@endsection
