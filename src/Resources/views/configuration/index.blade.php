@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.configuration.title') }}
@stop

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">

                <div class="page-title">
                    <h1>
                        {{ __('admin::app.configuration.title') }} 2
                    </h1>

                    <div class="control-group">
                        <select class="control" id="channel-switcher" name="channel">
                            @foreach (core()->getAllChannels() as $channelModel)

                                <option value="{{ $channelModel->code }}" {{ ($channelModel->code) == $channel ? 'selected' : '' }}>
                                    {{ $channelModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>

                    <div class="control-group">
                        <select class="control" id="locale-switcher" name="locale">
                            @foreach (core()->getAllLocales() as $localeModel)

                                <option value="{{ $localeModel->code }}" {{ ($localeModel->code) == $locale ? 'selected' : '' }}>
                                    {{ $localeModel->name }}
                                </option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('admin::app.configuration.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                   <el-checkbox>Option</el-checkbox>
                    @csrf()
                    @if ($groups = array_get($config->items, request()->route('slug') . '.children.' . request()->route('slug2') . '.children'))

                        @foreach ($groups as $key => $item)

                            <accordian :title="'{{ __($item['name']) }}'" :active="false">
                                <div slot="body">
                                    <?php if (isset($item['admin_view'])): ?>
                                        @include ($item['admin_view'], ['fields' => $item['fields']])
                                    <?php else: ?>
                                    @foreach ($item['fields'] as $field)
                                        @include ('admin::configuration.field-type', ['field' => $field])
                                    @endforeach
                                    <?php endif; ?>
                                </div>
                            </accordian>

                        @endforeach

                    @endif

                </div>
            </div>

        </form>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#channel-switcher, #locale-switcher').on('change', function (e) {
                $('#channel-switcher').val()
                var query = '?channel=' + $('#channel-switcher').val() + '&locale=' + $('#locale-switcher').val();

                window.location.href = "{{ route('admin.configuration.index', [request()->route('slug'), request()->route('slug2')]) }}" + query;
            })
        });
    </script>
@endpush
