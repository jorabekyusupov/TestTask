<h3><b>Tizimga bo'lgan talablar:</b></h3><br/>

    PHP: 7.4
    Laravel: 8

<h3><b>O'rnatish qadamlari:</b></h3><br/>

1. <code>composer update</code>
	
        Kerakli package larni o'rnatadi

2. Config qilish

        - .env file hosil qiling
        - DB yarating va .env file ni update qiling

3. <code>php artisan key:generate</code>
	
	    Applicatation key yaratadi	

4. <code>php artisan migrate:fresh</code>
	
	    DB ga table va view lar yaratadi	
	
5. <code>php artisan passport:install --force</code>

	    Client ID va Client secret larni generate qiladi.	
	
6. <code>php artisan db:seed</code>
		
	    Superadmin user yaratadi:

	    username: superadmin@gmail.com
        password: admin1234

7. Shundan so'ng username, password, client id va client secret yordamida Bearer token olish mumkin.

