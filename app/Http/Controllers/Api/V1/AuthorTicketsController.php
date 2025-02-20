<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreTicketRequest;
use App\Http\Resources\V1\TicketResource;
use App\Models\Ticket;
use App\Http\Filters\V1\TicketFilter;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorTicketsController extends ApiController
{
    public function index( $author_id,TicketFilter $filter)
    {
        return TicketResource::collection(
            Ticket::where('user_id', $author_id)
            ->filter($filter)->paginate()
        );
    }

    public function store($author_id,StoreTicketRequest $request, Ticket $ticket){
        $model =[
            'title' => $request->input('data.attributes.title'),
            'description' => $request->input('data.attributes.title'),
            'status' => $request->input('data.attributes.status'),
            'user_id' =>$author_id,
        ];
        return new TicketResource(Ticket::create($model));
    }

    public function destroy($author_id, $ticket_id)
    {
        try {
            $ticket = Ticket::findOrFail($ticket_id);

            if ($ticket->user_id == $author_id) {
                $ticket->delete();
                return $this->ok('Ticket has been deleted');
            }
            return $this->error('Ticket not found',404);

        }catch (ModelNotFoundException $exception){
            return $this->error('Ticket cannot be found',404);
        }
    }
}
