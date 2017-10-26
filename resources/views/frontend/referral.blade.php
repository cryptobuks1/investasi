@extends('layouts.frontend')

@section('body-content')

    <style>
        div.panel:first-child {
            margin-top:20px;
        }

        div.treeview {
            min-width: 100px;
            min-height: 100px;

            max-height: 256px;
            overflow:auto;

            padding: 4px;

            margin-bottom: 20px;

            color: #369;

            border: solid 1px;
            border-radius: 4px;
        }
        div.treeview ul:first-child:before {
            display: none;
        }
        .treeview, .treeview ul {
            margin:0;
            padding:0;
            list-style:none;

            color: #369;
        }
        .treeview ul {
            margin-left:1em;
            position:relative
        }
        .treeview ul ul {
            margin-left:.5em
        }
        .treeview ul:before {
            content:"";
            display:block;
            width:0;
            position:absolute;
            top:0;
            left:0;
            border-left:1px solid;

            /* creates a more theme-ready standard for the bootstrap themes */
            bottom:15px;
        }
        .treeview li {
            margin:0;
            padding:0 1em;
            line-height:2em;
            font-weight:700;
            position:relative
        }
        .treeview ul li:before {
            content:"";
            display:block;
            width:10px;
            height:0;
            border-top:1px solid;
            margin-top:-1px;
            position:absolute;
            top:1em;
            left:0
        }
        .tree-indicator {
            margin-right:5px;

            cursor:pointer;
        }
        .treeview li a {
            text-decoration: none;
            color:inherit;

            cursor:pointer;
        }
        .treeview li button, .treeview li button:active, .treeview li button:focus {
            text-decoration: none;
            color:inherit;
            border:none;
            background:transparent;
            margin:0px 0px 0px 0px;
            padding:0px 0px 0px 0px;
            outline: 0;
        }
    </style>

    <!-- Banner -->
    <div class="page-banner">
        <div class="container">
            <div class="parallax-mask"></div>
            <div class="section-name">
                <h2>Referral</h2>
                <div class="short-text">
                    <h5><a href="{{route('index')}}">Beranda</a>
                        <i class="fa fa-angle-double-right"></i>Referral</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- contact wrapper -->
    <div class="contact-page-wrapper">
        <div class="container">
            <div class="row">
                <h2>Your Referral Tree</h2>
                <ul class="treeview">
                    @foreach($level1 as $item1)
                        <li>
                            <a href="#">{{$item1->user1->first_name . ' ' . $item1->user1->last_name}}</a>
                            @foreach($level2 as $item2)
                                @if($item2->user_id_parent == $item1->user_id_child)
                                    <ul>
                                        <li>
                                            <a href="#">{{$item2->user1->first_name . ' ' . $item2->user1->last_name}}</a>
                                            @foreach($level3 as $item3)
                                                @if($item3->id == $item2->user_id_child)
                                                    <ul>
                                                        <li><a href="#">{{$item3->first_name . ' ' . $item3->last_name}}</a></li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection