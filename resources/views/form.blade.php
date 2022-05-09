<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="{{ asset('/css/now-ui-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/now-ui-dashboard.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <style>
        .file-upload .file-upload-select {
            display: block;
            color: #dbdbdb;
            cursor: pointer;
            text-align: left;
            background: #1a242f;
            overflow: hidden;
            position: relative;
            border-radius: 6px;
        }

        .file-upload .file-upload-select .file-select-button {
            background: #161f27;
            padding: 10px;
            display: inline-block;
        }

        .file-upload .file-upload-select .file-select-name {
            display: inline-block;
            padding: 10px;
        }

        .file-upload .file-upload-select:hover .file-select-button {
            background: #324759;
            color: #ffffff;
            transition: all 0.2s ease-in-out;
            -moz-transition: all 0.2s ease-in-out;
            -webkit-transition: all 0.2s ease-in-out;
            -o-transition: all 0.2s ease-in-out;
        }

        .file-upload .file-upload-select input[type="file"] {
            display: none;
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                    CT
                </a>
                <a href="http://www.creative-tim.com" class="simple-text logo-normal">
                    Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="./dashboard.html">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./icons.html">
                            <i class="now-ui-icons education_atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a href="./map.html">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a href="./notifications.html">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li>
                        <a href="./user.html">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="./tables.html">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a href="./typography.html">
                            <i class="now-ui-icons text_caps-small"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="./upgrade.html">
                            <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <div class="container">
                <div class="row">
                    <form method="POST" action="{{ isset($new) ? route('news.update',$new->id) : route('news.store') }}?dev=1" enctype="multipart/form-data">
                        @csrf
                        @isset($new)
                        @method('PUT')
                        @endisset
                        <div class="col-md-12">
                            <div class="card">
                                <div class="form-group col-md-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ isset($new) ? $new->title : old('title') }}" />
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Image</label>
                                    <div class="file-upload">
                                        <div class="file-upload-select">
                                            <div class="file-select-button">Choose File</div>
                                            <div class="file-select-name">No file chosen...</div>
                                            <input type="file" name="image" id="file-upload-input">
                                        </div>
                                    </div>
                                    @if(isset($new))
                                    <img id="image-pre" src="{{asset('images/'.$new->image) }}" width="120px" height="150px"
                                         style="object-fit: cover; background-color: #fff; padding: 4px; border: 1px solid #ededf0; border-radius: 3px">
                                    @endif
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Content</label>
                                    <textarea name="content" class="form-control " id="editor1">{{ isset($new) ? $new->content : '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        @if(!isset($new))
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-plus-circle"></i> <span> Tạo mới</span></button>
                        @else
                        <button type="submit" class="btn btn-outline-primary"><i class="fas fa-arrow-circle-up"></i> <span> Cập nhật</span></button>
                        @endif
                    </form>
                </div>
            </div>

            <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
            <script>
                CKEDITOR.replace('editor1');
                let fileInput = document.getElementById("file-upload-input");
                let fileSelect = document.getElementsByClassName("file-upload-select")[0];
                fileSelect.onclick = function() {
                    fileInput.click();
                }
                fileInput.onchange = function() {
                    let filename = fileInput.files[0].name;
                    let selectName = document.getElementsByClassName("file-select-name")[0];
                    selectName.innerText = filename;
                }
            </script>
            <footer class="footer">
                <div class=" container-fluid ">
                    <nav>
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright" id="copyright">
                        &copy; <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Designed by <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/now-ui-dashboard.min.js?v=1.5.0') }} type=" text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('demo/demo.js') }}"></script>

</html>