@foreach($menu as $item)
    @if($item['type'] == 1)
        <div class="interface-item mt-2">
            <div class="d-flex justify-content-between align-items-center"
                 onclick="clickMenu(this)">
                <div class="parent-name flex-grow-1">
                    {!!str_repeat("&nbsp;",$tag)!!}
                    @if(isset($item['children'])  && !empty($item['children']) )
                        <img src="/static/icons/chevron-right.svg" class="right" width="14" height="14" alt="">&nbsp;
                    @endif
                    <img src="/static/icons/folder.svg" width="14" height="14"/> {{$item['name']}}
                </div>
                <div class="flex-grow-1">
                    <img src="/static/icons/plus.svg" width="16" height="16"  @click="add('{{$item["id"]}}')"/>
                    <img src="/static/icons/folder-plus.svg" width="16" height="16"
                         @click="addDir('{{$item["id"]}}')"/>
                </div>
            </div>
            @if(isset($item['children'])  && !empty($item['children']) )
                <div class="children">
                    <x-api-tree :menu="$item['children']" :tag="$tag+1"/>
                </div>
            @endif
        </div>
    @else
        <div class="interface-item">
            <div class="parent-name d-flex align-items-center" @click="edit('{{$item['id']}}')">
                <div class="method">
                    {!!str_repeat("&nbsp;",$tag)!!}
                    @if($item['method'] == 0)
                        GET
                    @elseif($item['method'] == 1)
                        POST
                    @elseif($item['method'] == 2)
                        PUT
                    @elseif($item['method'] == 1)
                        DELETE
                    @endif
                    &nbsp;
                </div>
                {{$item['name']}}
            </div>
        </div>
    @endif
@endforeach
