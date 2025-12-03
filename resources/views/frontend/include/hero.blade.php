
<section class="hero">
    <div class="overlay">
        <h1 style="color: white">Find Your Dream Home</h1>
        <p style="color: white;margin-bottom:130px;">Search for homes that suit your lifestyle</p>
        <div class="search-bar">
            <form action="{{ route('home') }}" method="GET">
                <select name="division" style="width:250px">
                    <option value="">Select Division</option>
                    <option value="Dhaka">Dhaka</option>
                    <option value="Mymensingh">Mymensingh</option>
                    <option value="Chittagong">Chittagong</option>
                    <option value="Sylhet">Sylhet</option>
                    <option value="Rajshahi">Rajshahi</option>
                    <option value="Khulna">Khulna</option>
                    <option value="barishal">Barisal</option>
                    <option value="Rangpur">Rangpur</option>
                </select>

                <select name="price" style="width:250px">
                    <option value="">Select Price Range</option>
                    <option value="5000-8000">৳5000–৳8000</option>
                    <option value="9000-12000">৳9000–৳12000</option>
                    <option value="13000-15000">৳13000–৳15000</option>
                </select>

                <button style="width:180px">Search</button>
            </form>
        </div>
    </div>
</section>
