<?php


namespace Dingbat\Action\Task;

use Dingbat\Action;
use Dingbat\Model\Task;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class Add
 *
 * @category Action
 * @package  Dingbat\Action\Task
 * @author   Pierre Klink <dev@klinks.info>
 * @license  MIT http://opensource.org/licenses/MIT
 * @link     https://github.com/pklink/Dingbat
 */
class Add extends Action
{

    /**
     * Create new task
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function run()
    {
        $request = $this->request;

        $task = new Task();
        $task->name     = $request->get('name');
        $task->marked   = $request->get('marked', false);
        $task->priority = $request->get('priority', Task::PRIORITY_NORMAL);
        $task->cardid   = $request->get('cardId', 1);
        $task->save();

        $return = [
            'id'   => (int) $task->id,
        ];

        return JsonResponse::create($return);
    }

}

