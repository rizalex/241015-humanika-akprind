var Script = function () {



    $().ready(function() {


        // validate signup form on keyup and submit
        $("#signupForm").validate({
            rules: {
				lokasi: "required",
				penyakit: "required",
				ket: "required",
				name: "required",
				level: "required",
				norek: "required",
				nama_mhs: "required",
				nim: "required",
				no_telp: "required",
				alamat_asal: "required",
				alamat_jogja: "required",
				namapemilik: "required",
				asal_sekolah: "required",
				tempat_lahir: "required",
				biaya: "required",
				namabank: "required",
				jumlah: "required",
				kuota: "required",
				tahun: "required",
				deskripsi: "required",
                firstname: "required",
                lastname: "required",
                username: {
                    required: true,
                    minlength: 2
                },
				passl: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {
				
				norek: "Field can not be empty",
				ket: "Field can not be empty",
				nim: "Field can not be empty",
				level: "Field can not be empty",
				nama_mhs: "Field can not be empty",
				alamat_asal: "Field can not be empty",
				alamat_jogja: "Field can not be empty",
				no_telp: "Field can not be empty",
				asal_sekolah: "Field can not be empty",
				tempat_lahir: "Field can not be empty",
				namabank: "Field can not be empty",
				jumlah: "Field can not be empty",
				namapemilik: "Field can not be empty",
				lokasi: "Field can not be empty",
				penyakit: "Field can not be empty",
				kuota: "Field can not be empty",
				tahun: "Field can not be empty",
				biaya: "Field can not be empty",
				deskripsi: "Field can not be empty",
				name: "Field can not be empty",
                firstname: "Please enter your firstname",
                lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 2 characters"
                },
				passl: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                agree: "Please accept our policy"
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();