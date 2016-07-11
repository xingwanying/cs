
@extends('layouts.main')

@section('content')
    <article id="main">
        <section class="wrapper style5">
            <div class="inner">
                <div class="row">
                    <div id="searchPart">
                        <div class="input-group" style="width: 30%;margin-left: 3%">
                            <input type="text" id="info_search" class="form-control" placeholder="搜索" onkeypress="getInfo(this.value);"/>
                            <span class="input-group-btn">
                              <button onclick="get_Info()" style="height: 39px;" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </span>
                        </div>

                        <div class="row">
                            <ul class="mailbox-attachments clearfix">
                                <li class="new_info">
                                    <div class="mailbox-attachment-info" >
                                        <a href="{{ url('information/create') }}" class="btn btn-app new">
                                            <i class="fa fa-plus add"></i>
                                        </a>
                                    </div>
                                    <h2 style="margin: 15% 10% 5% 35%;"> 新建图文</h2>
                                </li>
                                @for ($i=0; $i< (count($info['data'])); $i++)
                                    <li class="info">
                                        <span class="mailbox-attachment-icon has-img">
                                            <img class="img-responsive" src="{{ $info['data'][$i]['cover_img_url'] }}" onerror="this.onerror=null;this.src='{{ '/images/default.png' }}'" />
                                        </span>
                                        <div class="mailbox-attachment-info">
                                            <a href="" class="mailbox-attachment-name">
                                                <div style="width: 300px;height: 20px; overflow: hidden;" ><h4>{{ $info['data'][$i]['title'] }}</h4></div>
                                            </a>
                                            <span class="mailbox-attachment-size">
                                                    <p style="margin: 0">{{ $info['data'][$i]['updated_at']}}</p>
                                            </span>
                                            <a  href="{{ url('information/edit/'.$info['data'][$i]['id']) }}"  id="edit" class="button icon fa-pencil-square-o" style="width: 49%"></a>
                                            <a id="id" onclick="getId({{ $info['data'][$i]['id'] }} )"  data-toggle="modal" style="width: 49%"  data-target="#myModal" class="button icon fa-trash-o" >
                                            </a>
                                        </div>
                                    </li>
                                @endfor

                            </ul>
                        </div>

                        <!--分页标签-->

                        <div class="footer page">
                            <ul class="pagination pagination-lg no-margin ">
                                <li id="pre"><a href="javascript:void(0)" onclick="getPreviousPage('/information/show?page=')">&laquo;</a></li>
                                <li id="next"><a href="javascript:void(0)" onclick="getNextPage('/information/show?page=')">&raquo;</a></li>
                                <input type="hidden" id="last" value="{{ $info['last_page'] }}">
                                <input type="hidden" id="current" value="{{ $info['current_page'] }}">
                            </ul>
                            <div class="page_num">{{ $info['current_page'] }}/{{ $info['last_page'] }}</div>
                        </div>
                        <!--模态对话框-->
                        <!-- Button trigger modal
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">图文管理</h4>
                                    </div>
                                    <div class="modal-body">
                                        您确定要删除这条图文吗？
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">取 消</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="infoDelete()" >确 定</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </article>
@endsection