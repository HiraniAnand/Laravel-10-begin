<form action="{{ route('register') }}" method="post" style="width: 50%; margin: 10px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; background-color: #fff;">
    @csrf
    <h2 style="text-align: center;">Student Profile</h2>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" >
    </div>
    <div class="form-group">
        <label for="dob">DOB</label>
        <input type="date" name="dob" id="dob" class="form-control" >
    </div>
    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="tel" name="mobile" id="mobile" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" >
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" id="gender1" value="Male"> <span>Male</span>
        <input type="radio" name="gender" id="gender2" value="Female"> <span>Female</span>
        <input type="radio" name="gender" id="gender3" value="Other"> <span>Other</span>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" ></textarea>
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <select name="city" id="city" class="form-control" >
            <option value="">Select City</option>
            <option value="Surat">Surat</option>
            <option value="Kota">Kota</option>
            <option value="Delhi">Delhi</option>
            <option value="Goa">Goa</option>
            <option value="Chennai">Chennai</option>
            <option value="Vadodara">Vadodara</option>
        </select>
    </div>
    <div class="form-group">
        <label for="state">State</label>
        <select name="state" id="state" class="form-control" >
            <option value="">Select State</option>
            <option value="Gujarat">Gujarat</option>
            <option value="MP">MP</option>
            <option value="UP">UP</option>
            <option value="Bihar">Bihar</option>
            <option value="Rajsthan">Rajsthan</option>
            <option value="Karnataka">Karnataka</option>
        </select>
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <select name="country" id="country" class="form-control" >
            <option value="">Select City</option>
            <option value="India">India</option>
            <option value="Aus">Aus</option>
            <option value="UK">UK</option>
            <option value="USA">USA</option>
            <option value="Germany">Germany</option>
            <option value="China">China</option>
        </select>
    </div>
    <div class="form-group">
        <label for="hobbies">Hobbies</label>
        <input type="checkbox" name="hobbies[]" id="hobbies1" value="Reading"> <span>Reading</span>
        <input type="checkbox" name="hobbies[]" id="hobbies2" value="Writing"> <span>Writing</span>
        <input type="checkbox" name="hobbies[]" id="hobbies3" value="Singing"> <span>Singing</span>
        <input type="checkbox" name="hobbies[]" id="hobbies4" value="Dancing"> <span>Dancing</span>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>