@if (session('cart'))
<div class="shopper-informations">
  <div class="row" style="display: flex; justify-content: center !important;">
      <div class="col-sm-12 clearfix" style="width: 50%">
          <div class="bill-to">
              <p>Bill To</p>
              <div class="form-one" style="width: 100%">
                  <form action="{{ route('customer-order') }}" method="GET">
                    @csrf
                      <div>
                          <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                          <option value="" selected>Chọn tỉnh thành</option>           
                          </select>
                                    
                          <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                          <option value="" selected>Chọn quận huyện</option>
                          </select>
                          
                          <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                          <option value="" selected>Chọn phường xã</option>
                          </select>
                      </div>    
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
                      <script>
                              var citis = document.getElementById("city");
                              var districts = document.getElementById("district");
                              var wards = document.getElementById("ward");
                              var Parameter = {
                              url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
                              method: "GET", 
                              responseType: "application/json", 
                              };
                          var promise = axios(Parameter);
                          promise.then(function (result) {
                            renderCity(result.data);
                          });
                          
                          function renderCity(data) {
                            for (const x of data) {
                              citis.options[citis.options.length] = new Option(x.Name, x.Name);
                            }
                            citis.onchange = function () {
                              district.length = 1;
                              ward.length = 1;
                              if(this.value != ""){
                                const result = data.filter(n => n.Name === this.value);
                          
                                for (const k of result[0].Districts) {
                                  district.options[district.options.length] = new Option(k.Name, k.Name);
                                }
                              }
                            };
                            district.onchange = function () {
                              ward.length = 1;
                              const dataCity = data.filter((n) => n.Name === citis.value);
                              if (this.value != "") {
                                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
                          
                                for (const w of dataWards) {
                                  wards.options[wards.options.length] = new Option(w.Name, w.Name);
                                }
                              }
                            };
                          }
                      </script>
                      
                      <input type="text" placeholder="Phone number" name="phone_number" id="phone_number">
                      <div class="order-message">
                          <p>Shipping Order</p>
                          <textarea name="delivery_note"  placeholder="Notes about your order, Special Notes for Delivery" rows="8" style="height: 100px"></textarea>
                          <label><input type="checkbox"> Shipping to bill address</label>
                      </div>	
                      @if (auth()->user() != null)
                        <button type="submit" class="btn btn-primary"> Đặt hàng </button>
                      @else
                        <a href="{{ route('customer-login') }}" class="btn btn-primary">Đăng nhập để đặt hàng</a>
                      @endif
                      
                  </form>
              </div>
          </div>
      </div>					
  </div>
</div>
@endif
