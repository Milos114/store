@extends('layouts.app')

@section('content')
    <div class="section group">
        <div class="cont-desc span_1_of_2">
            <div class="grid images_3_of_2">
                <img src="images/preview-img.jpg" alt="" />
            </div>
            <div class="desc span_3_of_2">
                <h2>Lorem Ipsum is simply dummy text </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                <div class="price">
                    <p>Price: <span>$500</span></p>
                </div>
                <div class="available">
                    <p>Available Options :</p>
                    <ul>
                        <li>Color:
                            <select>
                                <option>Silver</option>
                                <option>Black</option>
                                <option>Dark Black</option>
                                <option>Red</option>
                            </select></li>
                        <li>Size:<select>
                                <option>Large</option>
                                <option>Medium</option>
                                <option>small</option>
                                <option>Large</option>
                                <option>small</option>
                            </select></li>
                        <li>Quality:<select>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select></li>
                    </ul>
                </div>
                <div class="share">
                    <p>Share Product :</p>
                    <ul>
                        <li><a href="#"><img src="images/youtube.png" alt=""></a></li>
                        <li><a href="#"><img src="images/facebook.png" alt=""></a></li>
                        <li><a href="#"><img src="images/twitter.png" alt=""></a></li>
                        <li><a href="#"><img src="images/linkedin.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="add-cart">
                    <div class="rating">
                        <p>Rating:<img src="images/rating.png"><span>[3 of 5 Stars]</span></p>
                    </div>
                    <div class="button"><span><a href="#">Add to Cart</a></span></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="product-desc">
                <h2>Product Details</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
            <div class="product-tags">
                <h2>Product Tags</h2>
                <h4>Add Your Tags:</h4>
                <div class="input-box">
                    <input type="text" value="" />
                </div>
                <div class="button"><span><a href="#">Add Tags</a></span></div>
            </div>
        </div>
        <div class="rightsidebar span_3_of_1">
            <h2>CATEGORIES</h2>
            <ul>
                <li><a href="#">Mobile Phones</a></li>
                <li><a href="#">Desktop</a></li>
                <li><a href="#">Laptop</a></li>
                <li><a href="#">Accessories</a></li>
                <li><a href="#">Software</a></li>
                <li><a href="#">Sports & Fitness</a></li>
                <li><a href="#">Footwear</a></li>
                <li><a href="#">Jewellery</a></li>
                <li><a href="#">Clothing</a></li>
                <li><a href="#">Home Decor & Kitchen</a></li>
                <li><a href="#">Beauty & Healthcare</a></li>
                <li><a href="#">Toys, Kids & Babies</a></li>
            </ul>
            <div class="subscribe">
                <h2>Newsletters Signup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.......</p>
                <div class="signup">
                    <form>
                        <input type="text" value="E-mail address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';"><input type="submit" value="Sign up">
                    </form>
                </div>
            </div>
            <div class="community-poll">
                <h2>Community POll</h2>
                <p>What is the main reason for you to purchase products online?</p>
                <div class="poll">
                    <form>
                        <ul>
                            <li>
                                <input type="radio" name="vote" class="radio" value="1">
                                <span class="label"><label>More convenient shipping and delivery </label></span>
                            </li>
                            <li>
                                <input type="radio" name="vote" class="radio" value="2">
                                <span class="label"><label for="vote_2">Lower price</label></span>
                            </li>
                            <li>
                                <input type="radio" name="vote" class="radio"  value="3">
                                <span class="label"><label for="vote_3">Bigger choice</label></span>
                            </li>
                            <li>
                                <input type="radio" name="vote" class="radio"  value="5">
                                <span class="label"><label for="vote_5">Payments security </label></span>
                            </li>
                            <li>
                                <input type="radio" name="vote" class="radio" value="6">
                                <span class="label"><label for="vote_6">30-day Money Back Guarantee </label></span>
                            </li>
                            <li>
                                <input type="radio" name="vote" class="radio" value="7">
                                <span class="label"><label for="vote_7">Other.</label></span>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


