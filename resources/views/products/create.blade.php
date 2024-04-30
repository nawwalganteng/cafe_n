@extends('layout.app')
  
@section('title', 'Tambah product')
  
@section('contents')
    <h1 class="mb-0">Tambah</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
                    
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
            </div>
           
        </div>
        <div class="form-group row">
                        <label for="jenis_id" class="col-sm-4 col-form-label">Jenis</label>
                        <div class="col-sm-8">
                            <select name="jenis_id" id="jenis_id">
                                <option value="">Pilih Jenis</option>
                                @foreach ($jenis as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
        <div class="row mb-3">
            <div class="col">
                <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
            </div>
            </div>

            
    <div class="row mb-3">
         <div class="col">
        <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga">
    </div>




<div class="col">
    <input type="file" name="img" id="img" class="form-control-file" accept="image/*" onchange="previewImage(event)">
    <img id="imgPreview" src="#" alt="Preview" style="display: none; max-width: 300px; max-height: 300  px;">
</div>

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
</div>
            
            

 
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-info">Kirim</button>
            </div>
        
    </form>
@endsection