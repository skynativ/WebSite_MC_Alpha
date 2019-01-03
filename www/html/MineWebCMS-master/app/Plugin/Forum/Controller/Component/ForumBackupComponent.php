<?php

class ForumBackupComponent extends Component
{
    public function start()
    {
        $dbb = New DATABASE_CONFIG();
        $dbb = $dbb->{'default'};
        exec("mysqldump --host=".$dbb['host']."  --user=".$dbb['login']." --password=".$dbb['password']."  ".$dbb['database']." forum__configs forum__conversations forum__conversation_recipients forum__forums forum__forum_permissions forum__groups forum__groups_users forum__histories forum__insults forum__msg_reports forum__notes forum__profiles forum__punishments forum__topics forum__viewws > ../Plugin/Forum/Core/database/backup.sql");

        $suffix = 'backup_forum_'.date("Y_m_d H_i_s").'.zip';
        $fileSQL = dirname(__DIR__).'/Core/database/backup.sql';
        $fileSQL = str_replace('Controller/', '', $fileSQL);

        $file = dirname(__DIR__).'/Core/database/'.$suffix;
        $file = str_replace('Controller/', '', $file);

        $zip = new ZipArchive();
        if ($zip->open($file, ZIPARCHIVE::CREATE) !== TRUE) {
            $this->log('Cannot open zip archive');
        }
        $zip->addFile($fileSQL, "backup.sql");
        $zip->close();
        unlink($fileSQL);
    }

    public function delete($value)
    {
        $file = dirname(__DIR__).'/Core/database/'.$value;
        $file = str_replace('Controller/', '', $file);
        unlink($file);
    }

    public function deleteall()
    {
        $dir = '../Plugin/Forum/Core/database';
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if($file != '.' && $file != '..') {
                    $path = dirname(__DIR__).'/Core/database/'.$file;
                    $path = str_replace('Controller/', '', $path);
                    unlink($path);
                }
            }
            closedir($dh);
        }
    }

    public function set($value)
    {
        $file = dirname(__DIR__).'/Core/database/'.$value;
        $file = str_replace('Controller/', '', $file);

        $zip = new ZipArchive;
        $res = $zip->open($file);
        if($res === TRUE) {
            $path = dirname(__DIR__).'/Core/database';
            $path = str_replace('Controller/', '', $path);
            $zip->extractTo($path);
            $zip->close();
        }else{
            $this->log('Cannot unzip archive');
        }

        $sql = file_get_contents($path.'/backup.sql');
        $db = ConnectionManager::getDataSource('default');

        $tables = [
            'forum__configs',
            'forum__conversations',
            'forum__conversation_recipients',
            'forum__forums',
            'forum__forum_permissions',
            'forum__groups',
            'forum__groups_users',
            'forum__histories',
            'forum__insults',
            'forum__msg_reports',
            'forum__notes',
            'forum__profiles',
            'forum__punishments',
            'forum__topics',
            'forum__viewws'
                ];

        foreach ($tables as $table) {
            $db->query('DROP TABLE '.$table);
        }

        $db->query($sql);

        unlink($path.'/backup.sql');
    }
}