<?php
/**
 * Created by PhpStorm.
 * User: minhphuc429
 * Date: 6/18/18
 * Time: 15:54
 */

namespace App\Repositories\Eloquent;


class CategoryRepository extends BaseRepository
{
    /**
     * Specify Model class name
     */
    function model()
    {
        return 'App\Models\Category';
    }

    public function update($request, $id)
    {
        $this->findOrFail($id)->update($request->only('name'));
    }

    public function destroy($id)
    {
        $category = $this->findOrFail($id);
        //$category->posts()->delete(); TODO:: fix delete relate post
        $category->delete();
    }
}