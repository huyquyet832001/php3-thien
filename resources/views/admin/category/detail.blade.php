<h2>Thông tin danh mục</h2>
<p>Tên Danh Mục:{{ $cate->name }}</p>
<p>Số Lượng Sản Phẩm:{{ count($cate->products) }}</p>
<ul>
    @foreach ($cate->products as $p)
        <li>{{ $p->name }}</li>
    @endforeach
</ul>
