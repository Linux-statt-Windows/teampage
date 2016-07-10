<?php

class MemberModel
{

    /**
     * Gets the member list.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getMemberList()
    {
        return collect($this->_loadJson('members.json')['members'])->sortBy('name');
    }


    /**
     * Loads an json file.
     *
     * @param string $path  path to the json file
     * @return mixed[]      returns the content of the loaded json file
     */
    protected function _loadJson($path)
    {
        return json_decode(file_get_contents(__DIR__.'/'.$path), true);
    }
}