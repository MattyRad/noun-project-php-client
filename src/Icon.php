<?php namespace MattyRad\NounProject;

use MattyRad\Support\Conformation;

// TODO: this DTO may be a good candidate for "fractal" use? https://fractal.thephpleague.com/
class Icon
{
    use Conformation;

    private $attribution;
    private $collections;
    private $date_uploaded;
    private $icon_url;
    private $id;
    private $is_active;
    private $is_explicit;
    private $license_description;
    private $nounji_free;
    private $permalink;
    private $preview_url;
    private $preview_url_42;
    private $preview_url_84;
    private $sponsor;
    private $sponsor_campaign_link;
    private $sponsor_id;
    private $tags;
    private $term;
    private $term_id;
    private $term_slug;
    private $uploader;
    private $uploader_id;
    private $year;

    private function __construct(
        $attribution = '',
        $collections = [],
        $date_uploaded = '',
        $icon_url = '',
        $id = 0,
        $is_active = false,
        $is_explicit = false,
        $license_description = '',
        $nounji_free = false,
        $permalink = '',
        $preview_url = '',
        $preview_url_42 = '',
        $preview_url_84 = '',
        $sponsor = null,
        $sponsor_campaign_link = '',
        $sponsor_id = '',
        $tags = [],
        $term = '',
        $term_id = 0,
        $term_slug = '',
        $uploader = null,
        $uploader_id = 0,
        $year = 0
    ) {
        $this->attribution = $attribution;
        $this->collections = $collections;
        $this->date_uploaded = $date_uploaded;
        $this->icon_url = $icon_url;
        $this->id = $id;
        $this->is_active = $is_active;
        $this->is_explicit = $is_explicit;
        $this->license_description = $license_description;
        $this->nounji_free = $nounji_free;
        $this->permalink = $permalink;
        $this->preview_url = $preview_url;
        $this->preview_url_42 = $preview_url_42;
        $this->preview_url_84 = $preview_url_84;
        $this->sponsor = $sponsor;
        $this->sponsor_campaign_link = $sponsor_campaign_link;
        $this->sponsor_id = $sponsor_id;
        $this->tags = $tags;
        $this->term = $term;
        $this->term_id = $term_id;
        $this->term_slug = $term_slug;
        $this->uploader = $uploader;
        $this->uploader_id = $uploader_id;
        $this->year = $year;
    }

    public function getAttribution(): string
    {
        return (string) $this->attribution;
    }

    public function getCollections(): array
    {
        return (array) $this->collections;
    }

    public function getDateUploaded(): string
    {
        return (string) $this->date_uploaded;
    }

    public function getIconUrl(): string
    {
        return (string) $this->icon_url;
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function isActive(): bool
    {
        return (bool) $this->is_active;
    }

    public function isExplicit(): bool
    {
        return (bool) $this->is_explicit;
    }

    public function getLicenseDescription(): string
    {
        return (string) $this->license_description;
    }

    public function isNounjiFree(): bool
    {
        return (bool) $this->nounji_free;
    }

    public function getPermalink(): string
    {
        return (string) $this->permalink;
    }

    public function getPreviewUrl(): string
    {
        return (string) $this->preview_url;
    }

    public function getPreviewUrl42(): string
    {
        return (string) $this->preview_url_42;
    }

    public function getPreviewUrl84(): string
    {
        return (string) $this->preview_url_84;
    }

    public function getSponsor() // sponsor is an object of some sort
    {
        return $this->sponsor;
    }

    public function getSponsorCampaignLink()
    {
        return $this->sponsor_campaign_link;
    }

    public function getSponsorId(): int
    {
        return (int) $this->sponsor_id;
    }

    public function getTags(): array
    {
        return (array) $this->tags;
    }

    public function getTerm(): string
    {
        return (string) $this->term;
    }

    public function getTermId(): int
    {
        return (int) $this->term_id;
    }

    public function getTermSlug(): string
    {
        return (string) $this->term_slug;
    }

    public function getUploader() // uploader is an object of some sort
    {
        return $this->uploader;
    }

    public function getUploaderId(): int
    {
        return (int) $this->uploader_id;
    }

    public function getYear(): int
    {
        return (int) $this->year;
    }
}