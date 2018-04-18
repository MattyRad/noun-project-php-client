<?php namespace MattyRad\NounProject;

use MattyRad\Support\Conformation;

// TODO: this DTO may be a good candidate for "fractal" use? https://fractal.thephpleague.com/
class Collection
{
    use Conformation;

    private $author;
    private $author_id;
    private $date_created;
    private $date_updated;
    private $description;
    private $icon_count;
    private $id;
    private $is_collaborative;
    private $is_featured;
    private $is_published;
    private $is_store_item;
    private $name;
    private $permalink;
    private $slug;
    private $sponsor;
    private $sponsor_campaign_link;
    private $sponsor_id;
    private $tags;
    private $template;

    private function __construct(
        $author = null,
        $author_id = 0,
        $date_created = '',
        $date_updated = '',
        $description = '',
        $icon_count = 0,
        $id = 0,
        $is_collaborative = false,
        $is_featured = false,
        $is_published = false,
        $is_store_item = false,
        $name = '',
        $permalink = '',
        $slug = '',
        $sponsor = '',
        $sponsor_campaign_link = '',
        $sponsor_id = '',
        $tags = [],
        $template = 0
    ) {
        $this->author = $author;
        $this->author_id = $author_id;
        $this->date_created = $date_created;
        $this->date_updated = $date_updated;
        $this->description = $description;
        $this->icon_count = $icon_count;
        $this->id = $id;
        $this->is_collaborative = $is_collaborative;
        $this->is_featured = $is_featured;
        $this->is_published = $is_published;
        $this->is_store_item = $is_store_item;
        $this->name = $name;
        $this->permalink = $permalink;
        $this->slug = $slug;
        $this->sponsor = $sponsor;
        $this->sponsor_campaign_link = $sponsor_campaign_link;
        $this->sponsor_id = $sponsor_id;
        $this->tags = $tags;
        $this->template = $template;
    }

    public function getAuthor(): string
    {
        return (string) $this->author;
    }

    public function getAuthorId(): int
    {
        return (int) $this->author_id;
    }

    public function getDateCreated(): string
    {
        return (string) $this->date_created;
    }

    public function getDateUpdated(): string
    {
        return (string) $this->date_updated;
    }

    public function getDescription(): string
    {
        return (string) $this->description;
    }

    public function getIconCount(): int
    {
        return (int) $this->icon_count;
    }

    public function getId(): int
    {
        return (int) $this->id;
    }

    public function isCollaborative(): bool
    {
        return (bool) $this->is_collaborative;
    }

    public function isFeatured(): bool
    {
        return (bool) $this->is_featured;
    }

    public function isPublished(): bool
    {
        return (bool) $this->is_published;
    }

    public function isStoreItem(): bool
    {
        return (bool) $this->is_store_item;
    }

    public function getName(): string
    {
        return (string) $this->name;
    }

    public function getPermalink(): string
    {
        return (string) $this->permalink;
    }

    public function getSlug(): string
    {
        return (string) $this->slug;
    }

    public function getSponsor(): string
    {
        return (string) $this->sponsor;
    }

    public function getSponsorCampaignLink(): string
    {
        return (string) $this->sponsor_campaign_link;
    }

    public function getSponsorId(): string
    {
        return (int) $this->sponsor_id;
    }

    public function getTags(): array
    {
        return (array) $this->tags;
    }

    public function getTemplate(): int
    {
        return (int) $this->template;
    }
}
