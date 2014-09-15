<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('UsersTableSeeder');



    }

}

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rsmsa_users')->delete();
        DB::table('rsmsa_users')->insert(
            array(
                'firstName'=>'saida',
                'middleName'=>'saida',
                'lastName'=>'saida',
                'userName'=>'saida',
                'password'=>Hash::make('saida'),
                'email'=>'nurudinisaida@yahoo.com',
                'phoneNumber'=>'07832',
                'role'=>'admin',
                'stakeholderBranchId'=>'sumatra-dodoma',
                'created_at'=>new DateTime,
                'updated_at'=>new DateTime,

            )


            );


    }}





