<h1>検索</h1>
 
<form action="{{('/products')}}" method="GET">
	メーカー
    <p><input type="text" name="maker" value="{{$maker}}"></p>
	CPU
    <p><input type="text" name="cpu" value="{{$cpu}}"></p>
	HDD/SSD
    <p><input type="text" name="hdd_sdd" value="{{$hdd_ssd}}"></p>
	メモリ
    <p><input type="text" name="memory" value="{{$memory}}"></p>
	在庫数
   <p><input type="number" name="stock" value="{{$stock}}">以上</p>
    <p><input type="submit" value="検索"></p>
</form>
 
@if($products->count())
 
<table border="1">
    <tr>
        <th>maker</th>
        <th>hdd_sdd</th>
        <th>cpu</th>
        <th>memory</th>
        <th>stock</th>
    </tr>
    @foreach ($kensaku as $Kensak)
    <tr>
        <td>{{ $products->maker }}</td>
        <td>{{ $products->hdd_sdd }}</td>
        <td>{{ $products->cpu }}</td>
        <td>{{ $products->memory }}</td>
        <td>{{ $products->stock }}</td>
    </tr>
    @endforeach
</table>
 
@else
<p>見つかりませんでした。</p>
@endif