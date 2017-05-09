<?php

use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            ['clubname' => 'An Óige Photographic Group'],
            ['clubname' => 'Athlone Photography Club'],
            ['clubname' => 'Athy Photographic Society'],
            ['clubname' => 'Ballincollig Camera Club'],
            ['clubname' => 'Belfast Photo Imaging Club'],
            ['clubname' => 'Blackwater Photographic Society'],
            ['clubname' => 'Blarney Photography Club'],
            ['clubname' => 'Bray Camera Club'],
            ['clubname' => 'Breffni Photography Club'],
            ['clubname' => 'Buncrana Camera Club'],
            ['clubname' => 'Carlow Photographic Society'],
            ['clubname' => 'Carrick Camera Club'],
            ['clubname' => 'Carrigaline Photographic Society'],
            ['clubname' => 'Carrickmacross Camera Club'],
            ['clubname' => 'Catchlight Camera Club'],
            ['clubname' => 'Cavan Camera Club'],
            ['clubname' => 'Celbridge Camera Club'],
            ['clubname' => 'Clonakilty Camera Club'],
            ['clubname' => 'Clondalkin Camera Club'],
            ['clubname' => 'Clones Photography Group'],
            ['clubname' => 'Clonmel Camera Club'],
            ['clubname' => 'Cobh Camera Club'],
            ['clubname' => 'Cork Camera Group'],
            ['clubname' => 'Deise Camera Club'],
            ['clubname' => 'Drogheda Photographic Club'],
            ['clubname' => 'Dublin Camera Club'],
            ['clubname' => 'Dunboyne Camera Club'],
            ['clubname' => 'Dundalk Photographic Society'],
            ['clubname' => 'Dungarvan Camera Club'],
            ['clubname' => 'East Cork Camera Group'],
            ['clubname' => 'Ennis Camera Club'],
            ['clubname' => 'Enniscorthy Camera Club'],
            ['clubname' => 'Fermoy Camera Club'],
            ['clubname' => 'Greystones Camera Club'],
            ['clubname' => 'Kilkenny Photographic Society'],
            ['clubname' => 'Killarney Camera Club'],
            ['clubname' => 'Limerick Camera Club'],
            ['clubname' => 'Letterkenny Photographic Club'],
            ['clubname' => 'Malahide Camera Club'],
            ['clubname' => 'Mallow Camera Club'],
            ['clubname' => 'Mayo Photographic Club'],
            ['clubname' => 'Mid-Louth Camera Club'],
            ['clubname' => 'Midlands Photography Club'],
            ['clubname' => 'Mountmellick Photographic Society'],
            ['clubname' => 'Mountrath & District Camera Club'],
            ['clubname' => 'Mullingar Camera Club'],
            ['clubname' => 'Naas Photography Group'],
            ['clubname' => 'Navan Camera Club'],
            ['clubname' => 'Northwest Photographic Club'],
            ['clubname' => 'OffShoot Photography Society (South Dublin)'],
            ['clubname' => 'Palmerstown Camera Club Dublin'],
            ['clubname' => 'Portlaoise Camera Club'],
            ['clubname' => 'Rainbow Camera Club'],
            ['clubname' => 'Rush Library Camera Group'],
            ['clubname' => 'Satsun Photographic Club'],
            ['clubname' => 'Shannon Camera Club Clare'],
            ['clubname' => 'South Kildare Photography Club'],
            ['clubname' => 'St. Benedict’s Men’s Camera Club'],
            ['clubname' => 'Tallaght Photographic Society'],
            ['clubname' => 'Tommy Byrne Photographic Society(Arklow)'],
            ['clubname' => 'Táin Photographic Group'],
            ['clubname' => 'Waterford Camera Club'],
            ['clubname' => 'Wexford Camera Club'],
            ['clubname' => 'Wicklow Photography Club']]
        );
    }
}
