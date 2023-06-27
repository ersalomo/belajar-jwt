@props(['href', 'table', 'paginate', 'orderBy', 'search'])
<div class="d-flex mx-3 my-0 justify-content-around">
    <div class="col-1">
        <label>Paginate
        <select class="form-control text-xs" name="">
            @for($i = 0; $i <= 100; $i+=20)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
        </label>
    </div>
    <div class="col-1">
        <label>OrderBy
        <select class="form-control text-xs">
            <option value="name">name</option>
            <option value="name">phone</option>
        </select>
        </label>
    </div>
    <div class="col-1">
        <label>OrderBy
        <select class="form-control text-xs">
            <option value="asc">ASC</option>
            <option value="desc">DESC</option>
        </select>
        </label>
    </div>
    <div class="">
        <label>Role
        <select class="form-control text-xs" name="role">
            <option value="visitor">visitor</option>
            <option value="karyawan">karyawan</option>
        </select>
        </label>
    </div>
    <div class="">
        <label>Search
            <input type="text" class="search-result form-control text-xs"/>
        </label>
    </div>
    <div class="col">
        <a href="{{$href}}" class="btn mt-3 btn-sm ms-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                <path d="M16 19h6"></path>
                <path d="M19 16v6"></path>
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
            </svg>
            ADD
        </a>
    </div>
</div>
