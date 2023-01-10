<!--begin::input {{$name}} -->
<div class="{{ $className ?? 'col-md-6'}} fv-row">
    <!--begin::Label-->
    <label class="required fs-5 fw-bold mb-2">{{ __($label) }}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <input type="text" class="form-control form-control-solid" placeholder="{{ __($placeholder) }}"
           name="{{trim($name)}}"
           @if($required) required @endif value="{{trim($value)}}"/>
    <!--end::Input-->
    @error($name)
    <!--begin::Error {{$name}} -->
    <span class="fv-plugins-message-container fw-bolder invalid-feedback">{{$message}}</span>
    <!--end::Error {{$name}}-->
    @enderror
</div>
<!--end::input {{$name}}  -->
