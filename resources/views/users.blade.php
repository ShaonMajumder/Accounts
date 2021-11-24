@extends('layouts.app')
@section('top-css')
    <style>
        /*breakable table*/
        
        /*
        Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
        */
        @media
        only screen 
        and (max-width: 760px), (min-device-width: 768px) 
        and (max-device-width: 1024px)  {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

        tr {
        margin: 0 0 1rem 0;
        }
        
        tr:nth-child(odd) {
        background: #ccc;
        }
        
            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                /* Now like a table header */
                position: absolute;
                /* Top/left values mimic padding */
                top: 0;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }

            /*
            Label the data
        You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
            */
            @foreach ($users->first()->toArray() as $key => $column )
                td:nth-of-type({{ $loop->iteration }}):before { content: '{{ $key }}' ; }
            @endforeach
        }
        /*breakable table*/
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>

                

                <table class="table-bordered table-hover mb-5" role="table">
                    <thead role="rowgroup">
                        <tr class="table-success" role="row">
                            @foreach ($users->first()->toArray() as $key => $column )
                                <th scope="col" role="columnheader">{{ $key }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody role="rowgroup">
                        
                        @foreach($users as $data)               
                            <tr role="row" scope="row">
                                @foreach( $data->toArray() as $cell)
                                    <td role="cell">{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
