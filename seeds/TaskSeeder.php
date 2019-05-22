<?php


use Phinx\Seed\AbstractSeed;

class TaskSeeder extends AbstractSeed
{
    public function run()
    {
        $statuses = ['TODO', 'DOING', 'DONE'];

        $data = [];

        $preData = [
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'status' => 'TODO',
            'created_at' => date('Y-m-d H:i:s', mt_rand(strtotime('01-01-2019'), time())),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $startCreateAt = strtotime('01-01-2019');

        for ($i = 0; $i < 10; $i++) {
            $createAt = mt_rand($startCreateAt, time());
            $updatedAt = mt_rand($createAt, time());
            $data[] = array_merge($preData, [
                'status' => $statuses[mt_rand(0, 2)],
                'created_at' => date('Y-m-d H:i:s', $createAt),
                'updated_at' => date('Y-m-d H:i:s', $updatedAt)
            ]);

            $startCreateAt = $createAt;
        }

        $posts = $this->table('task');
        $posts->insert($data)
            ->save();
    }
}
