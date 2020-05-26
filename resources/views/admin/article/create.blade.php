@extends('admin.layouts')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm bài viết
                        </header>
                        <div class="panel-body">

                            <div class="position-center">
                             @include('admin.article.form')
                             </div>
                         </div>
                    </section>

               </div>
        </div>
@endsection