<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Console\Command;

use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Exception\ConsoleErrorException;
use Swoft\Console\Helper\Show;
use Swoft\Console\Input\Input;

/**
 * Class DemoCommand
 *
 * @Command()
 */
class DemoCommand
{
    /**
     * @CommandMapping()
     * @param Input $input
     */
    public function test(Input $input): void
    {
        Show::prettyJSON([
            'args' => $input->getArgs(),
            'opts' => $input->getOptions(),
        ]);
    }

    /**
     * @CommandMapping("err")
     * @throws ConsoleErrorException
     */
    public function coError(): void
    {
        ConsoleErrorException::throw('this is an error message');
    }

    /**
     * @CommandMapping("show")
     * @throws ConsoleErrorException
     */
    public function show(): void
    {
        Show::section('section title', 'This is body');

        $title = 'list title';
        $data = [
            'name'  => 'value text', // key-value
            'name2' => 'value text 2',
            'more info please XXX', // only value
        ];
        Show::aList($data, $title);

        $data = [
            'list1 title' => [
                'name' => 'value text',
                'name2' => 'value text 2',
            ],
            'list2 title' => [
                'name' => 'value text',
                'name2' => 'value text 2',
            ],
            // ... ...
        ];

        Show::mList($data);

        $data = [
            'application version' => '1.2.0',
            'system version' => '5.2.3',
            'see help' => 'please use php bin/app -h',
            'a only value message',
        ];
        Show::panel($data, 'panel show', ['borderChar' => '#']);

        $data = [
            [ "name" => 'henry', 'age' => 56, 'nationality' => 'China'], // first row
            [ "name" => 'Walcott', 'age' => 44, 'nationality' => 'Englang'], // second row
            ];
            $opts = [
                'showBorder' => true,
                'columns' => ['Name', 'Age', "nationality",]
            ];

        Show::table($data, 'a table', $opts);

        Show::helpPanel([
            "description" => 'a help panel description text. (help panel show)',
            "usage" => 'a usage text',
            "arguments" => [
                'arg1' => 'arg1 description',
                'arg2' => 'arg2 description',
            ],
            "options" => [
                '--opt1' => 'a long option',
                '-s' => 'a short option',
                '-d' => 'Run the server on daemon.(default: <comment>false</comment>)',
                '-h, --help' => 'Display this help message'
            ],
        ], false);
    }
}
