@extends('backend.layout.master')
@section('backend-head')
    <link href="{{ asset('backend') }}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <style>
        .fa-instagram {
            color: transparent;
            background: -webkit-radial-gradient(30% 107%, circle, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            background: -o-radial-gradient(30% 107%, circle, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            background-clip: text;
            -webkit-background-clip: text;
        }
    </style>
@endsection
@section('backend-main')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Supplier " {{ $user->name }} "</h4>
                    <p class="card-title-desc"></p>
                    <form method="post" action="{{ route('sellerss.update' , $user->id) }}" class="needs-validation" novalidate enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <label for="store_image">Seller image ( optional )</label>
                                <div class="custom-file">
                                    <input type="file" name="store_image" class="custom-file-input" id="store_image" onchange="readURL(this);">
                                    <label class="custom-file-label" for="store_image">Choose file</label>
                                    @error('store_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    @if(!empty($user->avatar))
                                        <img id="blah" class="mt-3" src="{{ url('storage/' . $user->avatar) }}"/>
                                    @else
                                        <img id="blah" class="blah_create mt-3" src=""/>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="store_background">Seller background ( optional )</label>
                                <div class="custom-file">
                                    <input type="file" name="store_background" class="custom-file-input" id="store_background" onchange="readURL2(this);">
                                    <label class="custom-file-label" for="store_background">Choose file</label>
                                    @error('store_background')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    @if(!empty($user->store_background))
                                        <img id="blah2" class="mt-3" src="{{ url('storage/' . $user->store_background) }}"/>
                                    @else
                                        <img id="blah2" class="blah_create mt-3" src=""/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}" required>
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">EMAIL</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="EMAIL" value="{{ $user->email }}" required>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">PASSWORD ( Writing in case of change )</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="password ( Writing in case of change )">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile" value="{{ $user->mobile }}" required>
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="hotline">Hotline</label>
                                    <input type="text" name="hotline" class="form-control" id="hotline" placeholder="Hotline" value="{{ $user->hot_number }}" required>
                                    @error('hotline')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="street_no">Street No.</label>
                                    <input type="text" name="street_no" class="form-control" id="street_no" placeholder="street no" value="{{ $user->street_nom }}" required>
                                    @error('street_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Zip Code" value="{{ $user->zip_code }}" required>
                                    @error('zip_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ $user->address }}" required>
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_ids">Category</label>
                                    <select name="category_ids[]" class="select2 form-control select2-multiple" multiple="multiple" id="category_ids" required>
                                        @foreach($categories as $category)
                                            <option
                                                    @foreach($select_categories as $select_category)
                                                            @if($category->id == $select_category->id) selected @endif
                                                    @endforeach
                                                    value="{{ $category->id }}">{{ $category->name }} / {{$category->getTranslatedAttribute('name',\App::getLocale('ar'))}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_ids')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" class="form-control select2" id="country_id" required>
                                        <option selected disabled hidden value="">---- Select Country ----</option>
                                        @foreach($countries as $country)
                                            <option
                                                    @if($country->id == $user->country_id) selected @endif
                                                    value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_id">State</label>
                                    <select name="state_id" class="form-control select2" id="state_id" required>
                                        @foreach($states as $state)
                                            <option
                                                    @if($state->id == $user->state_id) selected @endif
                                                    value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('state_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city_id">City</label>
                                    <select name="city_id" class="form-control select2" id="city_id" required>
                                        @foreach($cities as $city)
                                            <option
                                                    @if($city->id == $user->city_id) selected @endif
                                                    value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Optional Fields</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="working_from">Working From ( Time )</label>
                                    <input type="time" name="working_from" class="form-control" id="working_from" placeholder="Working From" value="{{ $user->working_from }}">
                                    @error('working_from')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="working_to">Working To ( Time )</label>
                                    <input type="time" name="working_to" class="form-control" id="working_to" placeholder="Working To" value="{{ $user->working_to }}">
                                    @error('working_to')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="delivery_time">Delivery Time</label>
                                    <input type="time" name="delivery_time" class="form-control" id="delivery_time" placeholder="Delivery Time" value="{{ $user->delivery_time }}">
                                    @error('delivery_time')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="delivery_fee">Delivery Fee</label>
                                    <input type="number" name="delivery_fee" class="form-control" id="delivery_fee" placeholder="Delivery Fee" value="{{ $user->delivery_fee }}">
                                    @error('delivery_fee')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="year_founded">Founded Year</label>
                                    <input type="date" name="year_founded" class="form-control" id="year_founded" placeholder="Founded Year" value="{{ $user->year_founded }}">
                                    @error('year_founded')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook">
                                        <i class="fab fa-facebook-square text-primary fa-2x"></i>
                                    </label>
                                    <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Facebook" value="{{ $user->facebook_url }}">
                                    @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">
                                        <i style="color: rgb(10 102 194);" class="fab fa-linkedin fa-2x"></i>
                                    </label>
                                    <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Linkedin" value="{{ $user->linkedin_url }}">
                                    @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">
                                        <i class="fab fa-instagram fa-2x"></i>
                                    </label>
                                    <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram" value="{{ $user->instagram_url }}">
                                    @error('instagram')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube">
                                        <i class="fab fa-youtube-square text-danger fa-2x"></i>
                                    </label>
                                    <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Youtube" value="{{ $user->youtube_url }}">
                                    @error('youtube')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('backend-footer')
    <script src="{{ asset('backend') }}/assets/libs/select2/js/select2.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-advanced.init.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/parsleyjs/parsley.min.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/form-validation.init.js"></script>
    <script src="{{ asset('backend') }}/mine.js"></script>
@endsection
