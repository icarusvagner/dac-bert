<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css" />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </head>
  <body>
    <section class="container">
      <header>DAC Guest Registration Form</header>
      <span style="width: 100%; justify-content: center; font-size: 18px; color: #ef4444; padding: 5px 0px; display: none;" id="err_msgs"></span>
      <div class="form">
        <div class="column">
            <div class="input-box">
              <label>First name</label>
              <input type="text" id="first_name" name="first_name" placeholder="Enter your first name" required />
            </div>
            <div class="input-box">
              <label>Last name</label>
              <input type="text" id="last_name" name="last_name" placeholder="Enter your last name" required />
            </div>
          </div>
        <!-- <div class="input-box"> -->
        <!--   <label>Email Address</label> -->
        <!--   <input type="text" placeholder="Enter email address" required /> -->
        <!-- </div> -->
        <div class="column">
          <!-- <div class="input-box"> -->
          <!--   <label>Phone Number</label> -->
          <!--   <input type="number" placeholder="Enter phone number" required /> -->
          <!-- </div> -->
          <div class="input-box">
            <label>Date</label>
            <input type="date" id="birth_date" name="birth_date" placeholder="Enter birth date" required />
          </div>
        </div>
        <!-- <div class="gender-box"> -->
        <!--   <h3>Gender</h3> -->
        <!--   <div class="gender-option"> -->
        <!--     <div class="gender"> -->
        <!--       <input type="radio" id="check-male" name="gender" checked /> -->
        <!--       <label for="check-male">male</label> -->
        <!--     </div> -->
        <!--     <div class="gender"> -->
        <!--       <input type="radio" id="check-female" name="gender" /> -->
        <!--       <label for="check-female">Female</label> -->
        <!--     </div> -->
        <!--     <div class="gender"> -->
        <!--       <input type="radio" id="check-other" name="gender" /> -->
        <!--       <label for="check-other">prefer not to say</label> -->
        <!--     </div> -->
        <!--   </div> -->
        <!-- </div> -->
        <div class="input-box address">
          <label>Address</label>
          <input type="text" id="address" name="address" placeholder="Enter street address" required />
          <label>Company name</label>
          <input type="text" id="company_name" name="company_name" placeholder="Company name" required />
          <label>Purpose</label>
          <input type="text" id="purpose" name="purpose" placeholder="Purpose" required />
          <div class="column">
            <div class="select-box">
              <select id="host" name="host">
                <option hidden>Host</option>
                <option>warren</option>
                <option>kiven</option>
                <option>wendel</option>
                <option>reymark</option>
              </select>
            </div>
            <div class="select-box">
                <select id="requires_wifi" name="requires_wifi">
                  <option hidden>Requires Wifi</option>
                  <option>Yes</option>
                  <option>No</option>
                </select>
              </div>
          </div>
          
        </div>
        <button id="submit_register">Save</button>
      </div>
    </section>

    <script>
      const err_msgs = document.querySelector("#err_msgs");
      const reg_form = document.querySelector("#submit_register");
      reg_form.addEventListener("click", () => {

        const first_name = document.querySelector("#first_name");
        const last_name = document.querySelector("#last_name");
        const birth_date = document.querySelector("#birth_date");
        const address = document.querySelector("#address");
        const company_name = document.querySelector("#company_name");
        const purpose = document.querySelector("#purpose");
        const host = document.querySelector("#host");
        const requires_wifi = document.querySelector("#requires_wifi");

        if (first_name.value.trim() === "" || last_name.value.trim() === "" || birth_date.value.trim() === "" || address.value.trim() === "" || company_name.value.trim() === "" || purpose.value.trim() === "" || host.value.trim() === "" || requires_wifi.value.trim() === "") {
          err_msgs.style.display = "flex";
          err_msgs.textContent = "Please do not leave some fields blank.";
          return;
        }

        const formData = new FormData();
        formData.append("first_name", first_name.value);
        formData.append("last_name", last_name.value);
        formData.append("birth_date", birth_date.value);
        formData.append("address", address.value);
        formData.append("company_name", company_name.value);
        formData.append("purpose", purpose.value);
        formData.append("host", host.value);
        formData.append("requires_wifi", requires_wifi.value);
        formData.append("choice", "register");

        fetch("./core/server.php", {
          method: "POST",
          body: formData,
        })
          .then(res => {
            if (!res.ok) {
              throw new Error("Network response was not ok");
            }

            return res.json();
        }).
          then(data => {
            console.log(data);
            err_msgs.style.color = '#22c55e';
            err_msgs.style.display = "flex";
            err_msgs.textContent = data.message;

            first_name.value = '';
            last_name.value = '';
            birth_date.value = '';
            address.value = '';
            company_name.value = '';
            purpose.value = '';
            host.value = 'Host';
            requires_wifi.value = 'Requires Wifi';
          })
            .catch(error => {
            console.error("Something went wrong: ", error);
          });
      }) 
    </script>

  </body>
</html>
