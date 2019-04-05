<?php

namespace Modules\Edu\Entities;

use App\Models\Pay;
use App\Traits\Site;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Services\UserService;

/**
 * 课单管理
 * Class EduOrder
 * @package Modules\Edu\Entities
 */
class EduOrder extends Model
{
    use Site;
    protected $fillable = ['sn', 'subject', 'price', 'site_id', 'user_id', 'type', 'lesson_id', 'status', 'month'];
    protected $casts = ['status' => 'boolean'];

    /**
     * 支付成功调用在这里改变定单状态
     * @throws \Throwable
     */
    public function success()
    {
        if (!$this['status']) {
            \DB::transaction(function () {
                $this['status'] = true;
                $this->save();
                switch ($this['type']) {
                    case 'lesson':
                        EduLessonBuy::updateOrCreate([
                            'user_id' => $this['user_id'],
                            'lesson_id' => $this['lesson_id'],
                            'site_id' => $this['site_id'],
                        ], []);
                        break;
                    case 'subscribe':
                        app(UserService::class)->addDuration($this['month'], $this->user);
                        break;
                }
            });
        }
    }

    /**
     * 系统支付关联用于获取商品的支付信息
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function pay()
    {
        return $this->morphMany(Pay::class, 'pay');
    }

    /**
     * 商品定单号
     * @return mixed
     */
    public function sn()
    {
        return $this['sn'];
    }

    /**
     * 商品价格
     * @return mixed
     */
    public function price()
    {
        return $this['price'];
    }

    /**
     * 商品名称
     * @return mixed
     */
    public function subject()
    {
        return $this['subject'];
    }

    public function lesson()
    {
        return $this->belongsTo(EduLesson::class);
    }

    /**
     * 商品链接
     * @return string
     */
    public function link()
    {
        switch ($this['type']) {
            case 'subscribe':
                return route('edu.front.subscribe.index');
                break;
            case 'lesson':
                return route('edu.front.lesson.show', $this->lesson);
                break;
        }
    }
}
