    <!-- Checkout Section Begin -->
    <section class="checkout spad">

        <div class="container"  >
            <div class="row">
                <div class="col-lg-12">

                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input id="fullname" type="text" name="fullname" value="" placeholder="Your name" wire:model="fullname" >
                                    </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>

                                <input id="address" type="text" name="address" value="" placeholder="Your name" wire:model="address" >
                            </div>
                            <div class="checkout__input">
                                <label for="order_desc">Nội dung thanh toán</label>
                                <textarea class="form-control" cols="20" id="order_desc" name="order_desc" wire:model='message' rows="2">Noi dung thanh toan</textarea>
                            </div>
                           <div  class="form-group" >
                                <label for="bank_code">Ngân hàng</label><br>
                                <select name="bank_code" id="bank_code" class="form-control">

                                    <option value="NCB"> Ngan hang NCB</option>
                                    <option value="AGRIBANK"> Ngan hang Agribank</option>
                                    <option value="SCB"> Ngan hang SCB</option>
                                    <option value="SACOMBANK">Ngan hang SacomBank</option>
                                    <option value="EXIMBANK"> Ngan hang EximBank</option>
                                    <option value="MSBANK"> Ngan hang MSBANK</option>
                                    <option value="NAMABANK"> Ngan hang NamABank</option>
                                    <option value="VNMART"> Vi dien tu VnMart</option>
                                    <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                    <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                    <option value="HDBANK">Ngan hang HDBank</option>
                                    <option value="DONGABANK"> Ngan hang Dong A</option>
                                    <option value="TPBANK"> Ngân hàng TPBank</option>
                                    <option value="OJB"> Ngân hàng OceanBank</option>
                                    <option value="BIDV"> Ngân hàng BIDV</option>
                                    <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                    <option value="VPBANK"> Ngan hang VPBank</option>
                                    <option value="MBBANK"> Ngan hang MBBank</option>
                                    <option value="ACB"> Ngan hang ACB</option>
                                    <option value="OCB"> Ngan hang OCB</option>
                                    <option value="IVB"> Ngan hang IVB</option>
                                    <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                </select>
                           </div> <br>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input id="phone" type="number" name="phone" value="" placeholder="10 digits format" wire:model="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input id="email" type="email" name="email" value="" placeholder="Type your email" wire:model="email">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ( $items as $i)
                                    <li>{{$i->name}} <span>{{$i->qty*$i->price}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>{{ Cart::subtotal(0) }}</span></div>
                                <div class="checkout__order__total">Total <span> {{ Cart::total(0) }}</span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="checkbox" id="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <button wire:click.prevent = 'placeOder1' class="site-btn">PLACE ORDER</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    @push('scripts')
    <script>

       $(document).ready(function() {
        debugger
        $("#txt_name").on("change", function(){
            alert($(this).val());

            Livewire.emit('getdata',$(this).val());
            debugger
        });
        })
    </script>
    @endpush
