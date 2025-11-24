@extends('layouts.app')

@section('title', 'Itens do pedido')
@section('subtitle', 'Detalhe cada item produzido')

@section('actions')
    <a href="{{ route('pedido-itens.create') }}" class="rounded-full bg-red-600 px-5 py-2 text-sm font-semibold text-white shadow hover:bg-red-500">
        Novo item
    </a>
@endsection

@section('content')
    <div class="rounded-2xl border border-gray-100 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-red-50 text-left text-xs font-semibold uppercase tracking-wide text-red-600">
                    <tr>
                        <th class="px-6 py-3">Pedido</th>
                        <th class="px-6 py-3">Item</th>
                        <th class="px-6 py-3">Quantidade</th>
                        <th class="px-6 py-3">Valor</th>
                        <th class="px-6 py-3 text-right"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($itens as $item)
                        <tr>
                            <td class="px-6 py-4 text-gray-600">#{{ $item->pedido?->id ?? '—' }}</td>
                            <td class="px-6 py-4 font-semibold text-gray-900">{{ $item->cardapioItem?->nome ?? '—' }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $item->quantidade }}</td>
                            <td class="px-6 py-4 text-gray-900 font-semibold">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-right">
                               
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">Nenhum item registrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-gray-100 px-6 py-4">
            {{ $itens->links() }}
        </div>
    </div>
@endsection

