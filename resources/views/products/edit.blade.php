@extends('layout.app')
  
@section('title', 'Edit Product')
  
@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="jenis_id" class="col-sm-4 col-form-label">Jenis ID</label>
            <div class="col-sm-8">
                <select name="jenis_id" id="jenis_id">
                    <option value="">Pilih Jenis ID</option>
                        @foreach ($jenis as $j)
                        @if($product->jenis_id == $j->id)
                            <option selected value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                        @else
                            <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" placeholder="nama_produk" value="{{ $product->nama_produk}}" >
            </div>
            
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="deskripsi" value="{{ $product->deskripsi}}" >
            </div>
            </div>

            <div class="row">
    <div class="col mb-3">
        <label class="form-label">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control" placeholder="harga" value="{{ $product->harga }}">
    </div>
</div>

<script>
    // Format angka ketika input ke field harga
    document.getElementById('harga').addEventListener('input', function(event) {
        let value = event.target.value;
        // Hapus semua karakter non-angka dari input
        let cleanValue = value.replace(/\D/g, '');
        // Format angka dengan titik setiap 3 digit
        let formattedValue = cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        // Set nilai input dengan format angka yang sudah diformat
        event.target.value = formattedValue;
    });
</script>
<div class="row">
    <div class="col mb-3">
    <p>New Photo<p>
    <input type="file" name="img" id="img" class="form-control-file" accept="image/*" onchange="previewImage(event)">
    <img id="imgPreview" src="#" alt="Preview" style="display: none; max-width: 300px; max-height: 300  px;">
    <script>
    function previewImage(event) {
        const imgPreview = document.getElementById('imgPreview');
        imgPreview.style.display = 'block';

        const reader = new FileReader();
        reader.onload = function() {
            imgPreview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<br>
<p>Previous Photo</p>
        @if($product->img)
    <img width="300px" src="{{asset('img')}}/{{ $product->img }}"  style="max-width: 100%; height: auto;">
    <!-- <input type="text" name="img" class="form-control" placeholder="img" value="{{ $product->img }}" readonly> -->
@else
        <input type="file" name="img" class="form-control-file" accept="image/*">
    
</div>
@endif
                </div>
</div>                
         <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Perbarui</button>
           
        </div>
    </form>
@endsection