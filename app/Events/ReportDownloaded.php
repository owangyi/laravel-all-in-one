<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReportDownloaded implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(
        public readonly int $userId,
        public readonly string $fileName,
        public readonly int $rowCount,
        public readonly string $completedAt
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel("reports.{$this->userId}"),
        ];
    }

    public function broadcastAs(): string
    {
        return 'report.downloaded';
    }

    public function broadcastWith(): array
    {
        return [
            'fileName' => $this->fileName,
            'rowCount' => $this->rowCount,
            'completedAt' => $this->completedAt,
        ];
    }
}
