<?php
namespace Limen\RedModel\Commands;

/**
 * Command for lrange
 * Class LrangeCommand
 * @package Limen\RedModel\Commands
 */
class LrangeCommand extends Command
{
    public function getScript()
    {
        $script = <<<LUA
    local values = {}; 
    for i,v in ipairs(KEYS) do 
        values[#values+1] = redis.pcall('lrange', v, 0, -1); 
    end 
    return {KEYS,values};
LUA;
        return $script;
    }
}