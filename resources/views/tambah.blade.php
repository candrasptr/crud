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
                    <form action="/crud/simpan" method="POST">
                    	@csrf
                    <div class="form-group">
                      <label @error('kodebarang')
                      class="text-danger" 
                      @enderror>Kode barang  @error('kodebarang')
                      | {{ $message }}
                      @enderror</label>
                      <input type="text" name="kodebarang" value="{{ old('kodebarang') }}" class="form-control">
                      
                    </div>
                    <div class="form-group">
                      <label @error('namabarang')
                      class="text-danger" 
                      @enderror>Nama barang  @error('namabarang')
                      | {{ $message }}
                      @enderror</label>

                      <input type="text" name="namabarang" class="form-control">
                    </div>
                    
           
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                </div>
              </div>
@endsection