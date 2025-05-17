<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <div class="flex">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                  <section>
                      <header>
                          <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                              {{ __('Social Media') }}
                          </h2>
                          <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                              {{ __("Facebook ,TikTok ,Instagram ,Twitter ,Linkedin ,Youtube ,Reddit ,Spotify ,Pinterest ,Campaign structure ,Rapid experimentation ,Copy optimization ,Multimedia content creation ,Audience segmentation ,Paid social reporting ") }}
                          </p>
                          <br>
                          <div class="flex items-center gap-4">
                              <a href="/user/social-media"><x-primary-button>{{ __('Details') }}</x-primary-button></a>
                          </div>
                      </header>
                  </section>
                </div>
            </div>
          </div>
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                  <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Video Marketing') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Strategy and audit ,Creative brief ,Pre-production planning ,Production ,Video editing ,Animation ,Video ads ,On-Location Shoots ,Studio Productions ,Testimonials ,YouTube + TikTok Videos ,GIFs ") }}
                            </p>
                            <br>
                            <div class="flex items-center gap-4">
                              <a href="/user/video"><x-primary-button>{{ __('Details') }}</x-primary-button></a>
                            </div>
                        </header>
                    </section>
                  </div>
              </div>
            </div>
          </div>
          <br><br>
          <div class="flex">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                      <section>
                          <header>
                              <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                  {{ __('Email Marketing') }}
                              </h2>
                              <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                  {{ __("Email automation strategy ,Campaign management ,Email newsletters ,Campaign development ,Email strategy and audit ,Email template design and production ") }}
                              </p>
                              <br>
                              <div class="flex items-center gap-4">
                                  <a href="/user/email"><x-primary-button>{{ __('Details') }}</x-primary-button></a>
                              </div>
                          </header>
                      </section>
                    </div>
                </div>
              </div>
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                      <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Site & Mobile App') }}
                                </h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("Web Development ,Mobile Application ,Game Development ,Blockchain Development ,Augmented Reality ,Artificial Intelligence ,NFT Game Development ,Big Data ,Spotify ") }}
                                </p>
                                <br>
                                <div class="flex items-center gap-4">
                                    <a href="/user/site"><x-primary-button>{{ __('Details') }}</x-primary-button></a>
                                </div>
                            </header>
                        </section>
                      </div>
                  </div>
                </div>
              </div>
              <br><br>
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Seo') }}
                                </h2>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("UI/UX audit for SEO ,Site architecture ,Backlink analysis ,Competitive analysis ,Search Console setup ,Content intent analysis ,Keyword research ,Competitor analysis ,Metadata optimization ,Internal linking audit ,Link building ,Site copy updates ,Image optimization ,Schema markup ,Local listings management ,Ongoing tracking and goal setup ") }}
                                </p>
                                <br>
                                <div class="flex items-center gap-4">
                                    <a href="/user/seo"><x-primary-button>{{ __('Details') }}</x-primary-button></a>
                                </div>
                            </header>
                        </section>
                  </div>
                </div>
        </div>
</x-app-layout>
