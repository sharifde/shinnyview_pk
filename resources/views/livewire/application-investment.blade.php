<div class="px-4 px-md-0">
    <div class="col-lg-8 col-md-10 mx-auto py-5 my-md-4">
        <div class="search-property-form" style="max-width:100%;">
            <div class="search-form-header bg-theme-dark">
                <h5 class="mb-0 text-white px-2 px-sm-4 py-3 f-medium">Application form
                    <span class="txb-color">for Investment</span>
                    <span class="rtl-name float-end d-inline-block">
                        فارم برائے سرمایا کاری
                    </span>
                </h5>
            </div>

            <form class="w-100" method="POST">
                <div class="w-100 mb-0 border-custom radius-y-12">
                    <div class="px-4 py-4 form-steps-main">
                        <div class="row form-steps-register">
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Name <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">نام</span>
                                </label>
                                <input type="text" class="w-100" wire:model="full_name" name="full_name" />
                                @error('full_name') <span class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>



                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Email <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">ای میل</span>
                                </label>
                                <input type="email" class="w-100" wire:model="email" required name="email" />
                                @error('email') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">CNIC<span class="ms-auto float-end me-2 rtl-name">شناختی
                                        کارڈ نمبر </span></label>
                                <input type="number" class="w-100" wire:model="cnic" name="cnic" />
                                {{-- @error('cnic') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror --}}
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Gender <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">جنس </span>
                                </label>
                                <select class="w-100" wire:model="gender">
                                    <option value="" selected>

                                    </option>
                                    <option value="Male">
                                        Male
                                    </option>
                                    <option value="Female">
                                        Female
                                    </option>
                                    <option value="others">
                                        Others
                                    </option>
                                </select>
                                @error('gender') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Marital Status
                                    <span class="ms-auto float-end me-2 rtl-name">ازدواجی حیثیت</span>
                                </label>
                                <select class="w-100" wire:model="status">
                                    <option value="" selected >

                                    </option>
                                    <option value="Married">
                                        Married
                                    </option>
                                    <option value="Single">
                                        Single
                                    </option>
                                </select>
                                @error('status') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Profession <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">پیشہ</span>
                                </label>
                                <input type="text" class="w-100" wire:model="profession" required
                                    name="profession" />
                                    @error('profession') <span
                                    class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Address<sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">پتہ</span>
                                </label>
                                <input type="text" class="w-100" wire:model="address" required
                                    name="address" />
                                    @error('address') <span
                                    class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Phone Number <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">فون نمبر</span>
                                </label>
                                <input type="number" class="w-100" minlength="11" wire:model="mobile" required
                                    name="mobile" />
                                    @error('mobile') <span
                                    class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Interested in<sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">خریدنے کی دلچسپی</span>
                                </label>
                                <select class="w-100" wire:model="intrested_in" id="parent-rel-select">
                                    <option value="" selected >

                                    </option>
                                    <option value="sector_area">
                                        Sector Area (ایریا منتخیب کریں)
                                    </option>
                                    <option value="society">
                                        Society (سوسائٹی)
                                    </option>
                                </select>
                                @error('intrested_in') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            @if($intrested_in == 'sector_area')

                            <div class="search-form-fields col-md-6 mb-3 child-drop-area" id="sector_area">
                                <label class="f-medium">Sector Area<sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">ایریا منتخیب کریں</span>
                                </label>
                                <select class="w-100" wire:model="interested_in_details">

                                    <option value="Residential property">
                                        Residential property (پراپرٹی | جائیداد ہائشی)
                                    </option>
                                    <option value="Commercial property">
                                        Commercial property (کمرشل پراپرٹی)
                                    </option>
                                    <option value="Cash plan">
                                        Full Cash plan (کیش پلان | نقد)
                                    </option>
                                    <option value="Instalment plan">
                                        Instalment plan - (قسط پلان)
                                    </option>
                                    <option>
                                        Price minimum to Max (قیمت کم – زیادہ )
                                    </option>
                                </select>
                            </div>
                            @endif
                            @if($intrested_in == 'society')

                            <div class="search-form-fields col-md-6 mb-3  child-drop-area" id="society">
                                <label class="f-medium">Societies<sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">سوسائٹی</span>
                                </label>
                                <select class="w-100" wire:model="interested_in_details">

                                    <option value="RDA">
                                        RDA (ر – ڈی – اے)
                                    </option>
                                    <option value="CDA">
                                        CDA (سی – ڈی – اے)
                                    </option>
                                    <option value="private_society">
                                        Private Society (پرائیویٹ {نجی} سوسائٹی)
                                    </option>
                                </select>
                            </div>
                            @endif
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Land<sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">زمین</span>
                                </label>
                                <select class="w-100" wire:model="land">
                                    <option value="" selected disabled>

                                    </option>
                                    <option value="residential">
                                        Residential (رہائشی)
                                    </option>
                                    <option value="commercial">
                                        Commercial (کمرشل)
                                    </option>
                                </select>
                                @error('land') <span
                                class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-md-6 mb-3">
                                <label class="f-medium">Budget <sup class="text-danger f-14">*</sup>
                                    <span class="ms-auto float-end me-2 rtl-name">بجٹ</span>
                                </label>
                                <input type="number" class="w-100"   wire:model="budget" required
                                    name="budget" />
                                    @error('budget') <span
                                    class="text-danger error text-right">{{ $message }}</span>@enderror
                            </div>
                            <div class="search-form-fields col-12 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="form-group-checkbox mt-2">
                                        <input type="checkbox" value="1" id="term_conditions"  wire:model="accept_term">
                                        <label for="term_conditions">I Accept
                                            <a href="{{ route('terms.conditions') }}"
                                                class="text-decoration-none txb-color">Terms & Condition</a>
                                        </label>
                                        @error('accept_term') <span
                                        class="text-danger error text-right">{{ $message }}</span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3 mt-4">
                            <div class="ms-auto form-submit-btn">
                                <button type="submit"
                                    class="border-0 f-medium rounded-btn px-5
                                py-2 bg-theme text-white"
                                    wire:click.prevent="store">
                                    Submit
                                    <span wire:target="store"
                                        wire:loading.class="spinner-border spinner-border-sm"></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
