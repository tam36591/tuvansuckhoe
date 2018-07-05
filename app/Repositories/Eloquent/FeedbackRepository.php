<?php
/**
 * Created by PhpStorm.
 * User: minhphuc429
 * Date: 7/1/18
 * Time: 12:06
 */

namespace App\Repositories\Eloquent;


use App\Mail\ReplyFeedback;
use Illuminate\Support\Facades\Mail;

class FeedbackRepository extends BaseRepository
{
    /**
     * Specify Model class name
     */
    function model()
    {
        return 'App\Models\Feedback';
    }

    public function reply($request, $id)
    {
        $feedback = $this->model->findOrFail($id);
        if (!$feedback->status) {
            $feedback->status = 1;
            $feedback->feedback = $request->input('content');
            $feedback->save();
            Mail::to($feedback->email)->queue(new ReplyFeedback($feedback));
        }
    }
}