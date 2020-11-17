@extends('layouts.master')

@section('title','tambah')

@section('konten')
<div class="card">
                  <div class="card-header">
                    <h4>HTML5 Form Basic</h4>
                  </div>
                  <div class="card-body">
                    <!-- <div class="alert alert-info">
                      <b>Note!</b> Not all browsers support HTML5 type input.
                    </div> -->
                    <form action="{{ route('crud.update',$barang->id) }}" method="POST">
                    	@csrf
                      @method('patch')
                    <div class="form-group">
                      <label @error('kodebarang')
                      class="text-danger" 
                      @enderror>Kode barang  @error('kodebarang')
                      | {{ $message }}
                      @enderror</label>
                      <input type="text" name="kodebarang"
                      @if(old('kodebarang'))
                      value="{{ old('kodebarang') }}" 
                      @else
                      value="{{ $barang->kode_barang }}"
                      @endif 
                      class="form-control">
                      
                    </div>
                    <div class="form-group">
                      <label @error('namabarang')
                      class="text-danger" 
                      @enderror>Nama barang  @error('namabarang')
                      | {{ $message }}
                      @enderror</label>

                      <input type="text" name="namabarang" 
                      @if(old('namabarang'))
                      value="{{ old('namabarang') }}" 
                      @else
                      value="{{ $barang->nama_barang }}"
                      @endif 
                      class="form-control">
                    </div>
                    
           
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
@endsection